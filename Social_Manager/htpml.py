__author__ = 'sp'

from HTMLParser import HTMLParser

# create a subclass and override the handler methods
class MyHTMLParser(HTMLParser):
    def handle_starttag(self, tag, attrs):
        if (tag == "div"):
            print "Encountered a start tag:", tag , attrs



import urllib2
response = urllib2.urlopen('http://www.ishayari.in/2015/09/best-shayari-about-myself-in-hindi-for.html')
html = response.read()


parser = MyHTMLParser()
parser.feed(html)