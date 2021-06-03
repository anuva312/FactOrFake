import pickle
import re
import nltk
from flask import Flask, render_template, request
# from flask_mysqldb import MySQL
from nltk.corpus import stopwords
from nltk.stem import WordNetLemmatizer

app = Flask(__name__)

#For connecting to database
# app.config['MYSQL_HOST'] = 'localhost'
# app.config['MYSQL_USER'] = 'root'
# app.config['MYSQL_PASSWORD'] = ''
# app.config['MYSQL_DB'] = 'factorfake'

# mysql = MySQL(app)

#Creating a connection cursor
# cursor = mysql.connection.cursor()

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
    print(filter_sentence)
    return filter_sentence


model = pickle.load(open('logreg_model.sav', 'rb'))



# default page
@app.route('/')
def home():
    return render_template('index.html')

# @app.route('/review', methods = ['POST', 'GET'])
# def review():


@app.route('/about')
def about():
    return render_template("about.html")


# To use the predict button in our web-app
@app.route('/predict', methods=['POST'])
def predict():
    # Get data from HTML Form
    title = request.form['title']
    url = request.form['url']
    content = request.form['content']

    total = title + url + content
    print(total)

    test_case = lemmatize_text(total)
    vectorizer = pickle.load(open('tfidf.pickle', 'rb'))
    vectors = vectorizer.transform([test_case])
    result = model.predict(vectors)
    print(result[0])

    # For rendering results on HTML GUI
    if result[0]:
        output = "Fact"
    else:
        output = "Fake"
    return render_template('index.html', prediction_text='The given piece of news article is {}'.format(output))

if __name__ == "__main__":
    app.run(debug = True)

