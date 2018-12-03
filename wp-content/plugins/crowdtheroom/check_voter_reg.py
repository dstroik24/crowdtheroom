#!/usr/bin/python3
import sys
from bs4 import BeautifulSoup
from selenium import webdriver
from pyvirtualdisplay import Display
from selenium.webdriver.support.ui import Select
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException
import time
import re


'''
This fucntion takes in the info needed to check if someone is registered to vote 
ONLY WORKS IN TEXAS 

url: https://teamrv-mvp.sos.texas.gov/MVP/back2HomePage.do
zip_code = 5-digit
dob: string formatted 'mm/dd/yyyy'
'''

def submit_form(input):
    first_name = input[1]
    last_name = input[2]
    county = input[3].upper()
    county = re.sub("COUNTY", "", county)
    county = re.sub("-", " ", county)
    dob = input[4]
    zip_code = input[5]


    # Initialize webdriver and go to url
    display = Display(visible=0, size=(800, 600))
    display.start()
    options = webdriver.ChromeOptions()
    options.add_argument('--no-sandbox')
    driver = webdriver.Chrome(chrome_options=options)
    url = "https://teamrv-mvp.sos.texas.gov/MVP/back2HomePage.do"
    driver.get(url)
    time.sleep(2)

    # Select the name, county, dob validation option
    try:
        driver.find_element_by_xpath("//select[@name='selType']/option[text()='Name, County, Date of Birth']").click()
        time.sleep(2)
    except:
        print("Couldn't click the validation type")
        return None

    # Find fields and put the given info in them
    # First name
    fname_field = driver.find_element_by_id("firstName")
    fname_field.send_keys(first_name)
    # Last name
    lname_field = driver.find_element_by_name("lastName")
    lname_field.send_keys(last_name)
    # Date of birth
    birthday_field = driver.find_element_by_id("dob")
    birthday_field.send_keys(dob)
    # Zip code
    zip_field = driver.find_element_by_id("adZip5")
    zip_field.send_keys(zip_code)
    # County selection
    try:
        driver.find_element_by_xpath("//select[@name='county']/option[text()='" + county + "']").click()
    except:
        print("Couldn't find county")
        return None
    

    # Click submit and send it
    submit_button = driver.find_element_by_id('VALIDBTN')
    submit_button.click()
    time.sleep(5)

    # Check for alert
    try:
        WebDriverWait(driver, 3).until(EC.alert_is_present(),
                                    'Timed out waiting for PA creation confirmation popup to appear.')
        alert = driver.switch_to.alert
        alert.accept()
        print("Invalid input into roter registration website")
        return None
    except TimeoutException:
        pass

    # Get html from page after submit
    html_source = driver.page_source
    driver.quit()

    # Return voter status
    return check_status(html_source)


def check_status(html_source):
    '''
    This function returns a boolean representing if a person is registered to vote in Texas

    BUT IT ALSO TAKES IN ALL THE OTHER INFO FROM THAT PAGE INCLUDING:
    Address
    Gender
    Valid From
    Effective Date of Registration
    Voter Status - (The field we want)
    County
    Precinct
    VUID
    '''

    isVoter = False

    # Make that soup baby
    soup = BeautifulSoup(html_source, 'html.parser')
    
    # Find the span that contains the first name
    nameSpan = soup.find(id="fullNameSpan")

    # Dictionary that will hold all the persons info that is returned
    info_dict = {}
    
    # Cycle through the siblings that contain other info
    for sib in nameSpan.next_siblings:
        # Ignore breaks, only want spans
        if str(sib) == "<br/>": continue
        
        # Get the text out of the tag
        raw_text = sib.string.strip()
        
        # Address line is weird
        if ":" not in raw_text:
            info_dict["Address"] += " " + raw_text
            continue
        # Split line up into the key and value for dict and append
        kv_pair = raw_text.split(":")
        info_dict[kv_pair[0].strip()] = kv_pair[1].strip()

    print(info_dict)
    if info_dict['Voter Status'] == "ACTIVE":
        isVoter = True

    if isVoter:return 1
    else: return 0



def main():
	# Get data input from console
    info = sys.argv
    if len(info) == 1:
        defaults = ["Daniel", "Stroik", "Travis", "02/10/1997", "78705"]
        info += defaults

    result = submit_form(info)
    print(result)
    




if __name__ == '__main__':
	main()