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
1. [FakeNewsNet](https://www.kaggle.com/mdepak/fakenewsnet)
2. [PHEME Dataset for Rumour Detection](https://figshare.com/articles/dataset/PHEME_dataset_for_Rumour_Detection_and_Veracity_Classification/63920787)
3. Kaggle Datasets


# Progress

So far, the Poltifact and Gossipcop (both fake and real) datasets have been combined into a single dataset of 33356 rows and 3 columns. The three columns are:  
* news_url : contains the source url
* title : news-headline/ tweet
* target : 1/0 (1- real, 0-fake)

All other columns have been dropped.  

## Data Cleaning
The following operations have been applied to the combined dataset:
* Combining _title_ and *news_url* into single column
* Tokenization
* Removing stop words
* Lemmatization

# Status
Ongoing... 
