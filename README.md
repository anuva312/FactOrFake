# FactOrFake
A machine learning model that predicts whether a given piece of news is fake or real!


# Introduction
More than traditional news streaming platforms like television, radio or newspapers, people
nowadays depend on news apps or social media to get the latest hot news. But unfortunately
many of these online published articles could be fake. In social media platforms these fake
news could spread extremely fast to a large section of the population. Fake news is typically
generated for commercial interests, to attract viewers and collect advertising revenue. However,
people and groups with potentially malicious agendas have been known to initiate fake news in
order to influence events and policies around the world. It can sometimes have a profound
impact on a country's economy and can even lead to widespread social unrest. The objective of
our project is to build a machine learning model that when given a news article headline (tweet)
will predict whether it’s real or fake. In this project along with using text-based processing, we
plan to look at other features like source of the news.


# Requirements
## Hardware Requirements

I3(or above) Processor, 8 GB RAM

## Software Requirements

Anaconda
 * Python 3
 * Jupyter Notebook
 * Sklearn Library

## Functional Requirements

NLTK library  
Pandas    
Sklearn Library


# Datasets
The folowing datasets have been used in this project:
1. [FakeNewsNet](https://github.com/KaiDMML/FakeNewsNet)

[//]: # (PHEME Dataset for Rumour Detection - https://figshare.com/articles/dataset/PHEME_dataset_for_Rumour_Detection_and_Veracity_Classification/63920787)

2. Kaggle Datasets
    1. [Getting Real About Fake News](https://www.kaggle.com/mrisdal/fake-news)
    2. [Covid-19 Fake News Dataset](https://www.kaggle.com/arashnic/covid19-fake-news)

[//]: # (Fake and Real News Dataset - https://www.kaggle.com/clmentbisaillon/fake-and-real-news-dataset)

# Proposed Work

## Data Collection and Cleaning

So far, the Poltifact and Gossipcop (both fake and real) datasets have been combined into a single dataset of 33356 rows and 3 columns. 

The _Getting Real About Fake News_ and _Covid-19 Fake News Dataset_ were also added to get a final dataset of size 37603 rows and 3 columns.

The three columns are:  
* news_url : contains the source url
* content : news-headline/ tweet
* fake : 1/0 (1- fake, 0-real)

All other columns have been dropped.  

## Natural Language Processing
The following operations have been applied to the combined dataset:
* Combining _title_ and *news_url* into single column
* Tokenization
* Removing stop words
* Lemmatization
* Vectorization

## Training the model
Algorithms used are:
* Logistic Regression
* Multinomial Naive Bias

## Testing the Model
The model has been tested using the following measures:
* Accuracy
* Precision
* Recall
* ROC Curve
* AUC Score

# Results

### Evaluation Scores

|  Algorithm    | Accuracy | Precision     | Recall  | F1 Score  | AUC Score     |
| :---        |    :----:  |    :----: |    :----:  |   :----:  |          ---: |
| Logistic Regression    | 0.8893764127110757 | 0.9412492269635127 | 0.834201151000274    | 0.8844980386459392   | 0.8925654515331949   |
| Multinomial Naive Bayes  | 0.8312724371759075  | 0.8020304568527918    | 0.8659906823787339  | 0.8327842930557384  | 0.8322722006934992     |


### Confusion Matrix for Logistic Regression

![Confusion Matrix](https://github.com/anuva312/FactOrFake/blob/main/Pictures/log-cm-percentage.PNG)

### ROC Curve for Logistic Regression
![ROC Curve](https://github.com/anuva312/FactOrFake/blob/main/Pictures/log-roc.PNG)


### Confusion Matrix for Multinomial Naive Bayes

![Confusion Matrix](https://github.com/anuva312/FactOrFake/blob/main/Pictures/nb-cm-percentage.PNG)

### ROC Curve for Multinomial Naive Bayes
![ROC Curve](https://github.com/anuva312/FactOrFake/blob/main/Pictures/nb-roc.PNG)

# Conclusion

Spread of fake news is not a new problem. For centuries, businesses and governments
have been using the media to influence people and execute propaganda. But the
generation of huge amounts of online content and their fast and vast reach into public is
a cause for immediate concern.


As can been seen from the previous section, the Logistic Regression Model was seen
to perform better than the Naive Bayes Model in terms of all accuracy measures except
for Recall. Logistic Regression Model also gave really high precision, around 0.94,
which is a desirable behaviour in real life. The overall accuracy and other performance
measures of both models are also better than what some of the previous works on the
same datasets have achieved. 

The datasets used in this project are mainly centered
around politics, gossip and Covid 19 data. So the performance of the model on any
other news topics could be unpredictable. In the future we can try adding more variety
of data into the datasets like sports,science etc. Or we can concentrate on one
particular topic and collect news articles only on that topic. This could help the model to
recognize interesting patterns and identify fake news from real pertaining to any
particular topic. Identifying such specific patterns can really improve the accuracy of a
model.


Also, other features like the no.of retweets, likes etc can be taken into account. Also,
instead of predicting whether the news article is real or fake, the probability of it being
fake or real can be predicted,since Logistic Regression is already being used and
performing well. 

In social media like Twitter, identification of bots that spread fake news
is another improvement that can be made in the existing design. More often than not,
fake news is propagated using bots that are designed to retweet tweets containing
certain phrases or hashtags. Also certain accounts are found to post articles that cause
public unrest to target a section of people. These usually involve false claims, theories
or biased accounts of various events. Taking them into account and studying their
structures can make the model highly complex but might improve the accuracy or at the
least we might be able to identify interesting patterns.


In short, a lot of efforts and research have gone into the problem of fake news detection. Numerous methods based on machine learning, deep learning and
even hybrid models have been proposed. Yet, an effective method to differentiate fake
news from real news still remains an open challenge.

# Status
Completed
