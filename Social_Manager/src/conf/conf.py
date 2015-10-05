__author__ = 'saurabh'

import os,sys,time
BASE_DIR = os.path.abspath(sys.argv[0]).split(sys.argv[0])[0]+"src/"

log_dir = BASE_DIR + "log/"
db_dir = BASE_DIR + "database/"

conf =  {
    "log":{
        "img": log_dir + "imgcrt.log",
        "Createimg": log_dir + "createimg.log",
        "Debug" : log_dir + "debug.log",
        "Error" : log_dir + "error.log"   ,
        "Warning": log_dir + "warning.log",
        "Critical":log_dir + "critical.log"
          }

        }

db = {
    "host":"localhost",
    "user":"root",
    "password":"Siddyking",
    "database":"funnymiku.in"

}

COLOR=  {
        "RED" : "\033[0;31m",
        "GREEN" :"\033[0;32m",
        "ORANGE":"\033[0;33m",
        "YELLOW":"\033[1;33m"
        }

img_dir = BASE_DIR+"img/"
font = BASE_DIR+"font/fontx.ttf"
database = BASE_DIR+"database/"
# Black        0;30     Dark Gray     1;30
# Red          0;31     Light Red     1;31
# Green        0;32     Light Green   1;32
# Brown/Orange 0;33     Yellow        1;33
# Blue         0;34     Light Blue    1;34
# Purple       0;35     Light Purple  1;35
# Cyan         0;36     Light Cyan    1;36
# Light Gray   0;37     White         1;37
# And then use them like this in your script:
#
# RED='\033[0;31m'
# NC='\033[0m' # No Color
# printf "I ${RED}love${NC} Stack Overflow\n"
