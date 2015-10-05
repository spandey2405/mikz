__author__ = 'saurabh'
from src.helper.fetch import get_data_json
import time
from src.conf import loggingmix

def get_post(page_id,access_token,limit, parameters=None):
    data = get_data_json(page_id,access_token,limit, parameters=parameters)
    try:
        posts = data["data"]
    except Exception as e:
        loggingmix.ERROR("Error While Fetching Data : get_post : " + str(data))
    else:
        return posts

def next_page(page_id,access_token,limit, parameters=None):
    data = get_data_json(page_id,access_token,limit, parameters=parameters)
    parameters = {}
    try :
        next = data["paging"]["next"]
        parms = next.split("?")
        parms = parms[1].split("&")
        for param in parms:
            para = param.split("=")
            parameters[para[0]]=para[1]
    except:
        loggingmix.ERROR(str(data))
    return parameters

def count_lines(message):
    count = 0
    text =message.split('\n')
    for key in text:
        count = count + 1
    return count

def get_title(message):
    text =message.split('\n')
    str = text[0]
    str = str.replace("'","")
    return str

def get_file_name():
    t = int(time.time())
    filename = "Funny-Miku-Jokes-"+str(t)+".png"
    return filename

def format_message(message):
    message = message.replace("\n\n","\n")
    message = message.replace("\n.\n.","\n.")
    message = message.replace('"',"")
    message = message.replace('&','and')
    sentence = ""
    count = 1
    noword = message.split(" ")
    for words in noword:
        if count%5 == 0:
            sentence = sentence + "\n"
        count = count + 1
        sentence = sentence + words + " "
    unwanted_char = [";","","(",")","[","]","=","" ":)","("]
    message = sentence.replace("'","")
    return message