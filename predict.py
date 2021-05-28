import pickle
import re
import nltk
from flask import Flask, render_template, request
from nltk.corpus import stopwords
from nltk.stem import WordNetLemmatizer
from sklearn.feature_extraction.text import TfidfVectorizer


stop_words = stopwords.words('english')
stop_words.extend(['https', 'http', 'www', 'com'])


def lemmatize_text(text):
    filter_sentence = ''
    sentence = re.sub(r'[^\w\s]', '', text)
    # Tokenization
    words = nltk.word_tokenize(sentence)
    # Stopwords removal
    words = [w for w in words if w not in stop_words]
    # Lemmatization
    lemmatizer = WordNetLemmatizer()
    for words in words:
        filter_sentence = filter_sentence + ' ' + str(lemmatizer.lemmatize(words)).lower()
    return filter_sentence


model = pickle.load(open('logreg_model.sav', 'rb'))
app = Flask(__name__)


# default page
@app.route('/')
def home():
    return render_template('index.html')


# To use the predict button in our web-app
@app.route('/predict', methods=['POST'])
def predict():
    # Get data from HTML Form
    title = request.form['title']
    url = request.form['url']
    content = request.form['content']

    total = title + url + content

    vectorizer = TfidfVectorizer()
    vectors = vectorizer.fit_transform(lemmatize_text(total))

    # For rendering results on HTML GUI
    if model.predict(vectors):
        output = "Fact"
    else:
        output = "Fake"
    return render_template('index.html', prediction_text='The given piece of news article is '.format(output))