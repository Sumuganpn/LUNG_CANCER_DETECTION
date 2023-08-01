import os
from flask import Blueprint, Flask, redirect, render_template, request, url_for
views = Blueprint(__name__, "views")
app = Flask(__name__)


@views.route('/')
def home():
    return render_template("index_1_load.htm", name="Sumugan")

            