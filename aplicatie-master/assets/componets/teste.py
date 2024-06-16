from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import unittest

class CurrencyConversionTest(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Chrome()  # asigură-te că ChromeDriver este în PATH

    def test_conversion(self):
        driver = self.driver
        driver.get("URL-ul_aplicației_tale")
        
        # Localizează elementele
        amount_input = driver.find_element_by_id("amount")
        from_currency_select = driver.find_element_by_id("from_currency")
        to_currency_select = driver.find_element_by_id("to_currency")
        convert_button = driver.find_element_by_id("convert")

        # Setează valorile pentru test
        amount_input.send_keys("100")
        from_currency_select.send_keys("USD")
        to_currency_select.send_keys("EUR")
        convert_button.click()

        # Verifică rezultatul
        result = driver.find_element_by_id("result").text
        self.assertIn("EUR", result)  # verifică dacă rezultatul conține "EUR"

    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()
