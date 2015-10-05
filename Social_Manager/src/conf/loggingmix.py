__author__ = 'saurabh'
import logging
from src.conf.conf import conf
from src.conf.conf import COLOR


def DEBUG(log):
    logging.addLevelName( logging.DEBUG, "\033[0;32m%s\033[0m" % logging.getLevelName(logging.DEBUG))
    logging.basicConfig(filename=conf["log"]["Createimg"],level=logging.DEBUG)
    logging.debug(log)

def WARNING(log):
    logging.addLevelName( logging.WARNING, "\033[1;35m%s\033[0m" % logging.getLevelName(logging.WARNING))
    logging.basicConfig(filename=conf["log"]["Createimg"],level=logging.WARNING)
    logging.warning(log)


def ERROR(log):
    logging.addLevelName( logging.ERROR, "\033[1;31m%s\033[0m" % logging.getLevelName(logging.ERROR))
    logging.basicConfig(filename=conf["log"]["Createimg"],level=logging.ERROR)
    logging.error(log)

def CRITICAL(log):
    logging.addLevelName( logging.CRITICAL, "\033[0;33m%s\033[0m" % logging.getLevelName(logging.CRITICAL))
    logging.basicConfig(filename=conf["log"]["Createimg"],level=logging.CRITICAL)
    logging.critical(log)

def IMGCREATE(log):
    logging.addLevelName( logging.DEBUG, "\033[0;32m%s\033[0m" % logging.getLevelName(logging.DEBUG))
    logging.basicConfig(filename=conf["log"]["img"],level=logging.DEBUG)
    logging.debug(log)