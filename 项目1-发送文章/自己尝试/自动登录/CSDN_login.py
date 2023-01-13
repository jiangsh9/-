# -*- coding:utf-8 -*-
from selenium import webdriver 
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait as wait
import os 
import time 
#引入chromedriver.exe 
chromedriver="/usr/local/bin/chromedriver.exe"
os.environ["webdrivr.chrome.driver"] = chromedriver 
browser = webdriver.Chrome(chromedriver)

#设置浏览器需要打开的url
url = "https://passport.csdn.net/login?code=public"
browser.get(url)

#使用selenium选择 账号登录按钮
#browser.find_element(By.PARTIAL_LINK_TEXT, '密码登录').click()
wait(browser, 1).until(EC.element_to_be_clickable((By.XPATH, "//span[text()='密码登录']"))).click()

#输入账号密码：获得用户名的placeholder属性为？， 密码的placeholder属性为？
browser.find_element(By.XPATH, "//input[contains(@placeholder,'手机号/邮箱/用户名')]").clear()
browser.find_element(By.XPATH, "//input[contains(@placeholder,'手机号/邮箱/用户名')]").send_keys("Jiansh9")
time.sleep(2)
browser.find_element(By.XPATH, "//input[contains(@placeholder,'密码')]").clear()
browser.find_element(By.XPATH, "//input[contains(@placeholder,'密码')]").send_keys("quanzhen123")
time.sleep(1)
#增加一秒钟的时间间隔
wait(browser, 1).until(EC.element_to_be_clickable((By.XPATH, "//button[text()='登录']"))).click()
time.sleep(1)

# #定位到滑块按钮元素
# ele_button = browser.find_element(By.XPATH, '//span[contains(@id,"nc_1_n1z")]')

# #定位到滑块区域元素
# ele = browser.find_element(By.XPATH, '//div[contains(@id,"nocaptcha")]')

# #拖动滑块
# ActionChains(browser).drag_and_drop_by_offset(ele_button, ele.size['width'], ele.size['height']).perform
time.sleep(1000)