__author__ = 'saurabh'

import requests

def get_data_json(page_id, access_token, limit, parameters = None):
    if parameters == None:
        parameters = {'access_token':access_token,'limit':limit}
    url = "https://graph.facebook.com/v2.4/" + str(page_id) + "/feed"
    r = requests.get(url, params=parameters)
    return r.json()
