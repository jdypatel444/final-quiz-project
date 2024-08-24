<template>
    <div class="quiz-container">
      <div v-if="!isQuizStarted && !quizCompleted" class="topic-selection">
        <h2>Select a Topic</h2>
        <select v-model="selectedTopic" @change="onTopicChange">
          <option value="" disabled>Select a topic</option>
          <option v-for="topic in topics" :key="topic.id" :value="topic.id">
            {{ topic.topic_name }}
          </option>
        </select>
        <button @click="startQuiz" :disabled="!selectedTopic">Start Quiz</button>
      </div>
  
      <div v-else-if="isQuizStarted">
        <div v-if="question" class="question-section">
          <h2>Question {{ currentQuestionIndex + 1 }} of {{ questions.length }}</h2>
          <p class="question-text">{{ question.question }}</p>
  
          <div v-for="(option, index) in question.options" :key="index" class="option-button">
            <button @click="submitAnswer(option, `Op${index + 1}`)"
                    :class="{'correct': isAnswerCorrect(`Op${index + 1}`), 'incorrect': isAnswerIncorrect(`Op${index + 1}`)}">
              {{ option }}
            </button>
          </div>
  
          <div class="navigation-buttons">
            <button v-if="!isLastQuestion" @click="nextQuestion">Next Question</button>
            <button v-if="isLastQuestion" @click="finishQuiz">Finish Quiz</button>
          </div>
            <!-- <div class="score-counter">
            <p>Current Score: {{ score * 10 }}</p>
          </div> -->
        </div>
      </div>
  
      <div v-else-if="quizCompleted" class="results-section">
        <h2>Quiz Complete</h2>
        <p>Your final score: {{ finalScore }}%</p>
        <p>{{ quote }}</p> <!-- Display the quote -->
        <button @click="goHome">Home</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'QuizComponent',
    data() {
      return {
        topics: [], // List of topics to populate the dropdown
        selectedTopic: null,
        questions: [],
        currentQuestionIndex: 0,
        userAnswers: [],
        score: 0, // Counter for correct answers
        isQuizStarted: false,
        quizCompleted: false, // New state to track if the quiz is completed
        finalScore: 0, // Store the final score as a percentage
        quote: '' // Store the quote based on the score
      };
    },
    computed: {
      question() {
        return this.questions[this.currentQuestionIndex];
      },
      isLastQuestion() {
        return this.currentQuestionIndex === this.questions.length - 1;
      }
    },
    methods: {
      async fetchTopics() {
        try {
          const response = await fetch('http://localhost:8080/project/REST-API/get-topics.php');
          const data = await response.json();
          if (data.status === 'success') {
            this.topics = data.data;
          } else {
            console.error('Error fetching topics:', data.message);
          }
        } catch (error) {
          console.error('Error:', error);
        }
      },
      async fetchQuestions() {
        if (this.selectedTopic) {
          try {
            const response = await fetch(`http://localhost:8080/project/REST-API/fetch-question.php?topic_id=${this.selectedTopic}`);
            const data = await response.json();
            if (data.status === 'success') {
              this.questions = data.data.map(q => ({
                ...q,
                options: [q.op1, q.op2, q.op3, q.op4]
              }));
            } else {
              console.error('Error fetching questions:', data.message);
            }
          } catch (error) {
            console.error('Error:', error);
          }
        }
      },
      onTopicChange() {
        this.questions = [];
        this.userAnswers = [];
        this.currentQuestionIndex = 0;
        this.score = 0;
        this.finalScore = 0;
        this.quote = ''; // Reset quote
        this.quizCompleted = false; // Reset quiz completed state
      },
      startQuiz() {
        this.isQuizStarted = true;
        this.fetchQuestions();
      },
      submitAnswer(selectedOption, selectedOp) {
        const correctAnswer = this.question.answer;
        if (selectedOp === correctAnswer) {
          this.score++; // Increment score if the answer is correct
        }
        this.userAnswers.push({ question: this.question.question, selectedOption, correctAnswer });
  
        // Show feedback and move to the next question
        this.$nextTick(() => {
          const buttons = document.querySelectorAll('.option-button button');
          buttons.forEach(button => {
            if (button.textContent === selectedOption) {
              button.classList.add(selectedOp === correctAnswer ? 'correct' : 'incorrect');
            }
          });
  
          setTimeout(() => {
            if (this.isLastQuestion) {
              this.finishQuiz();
            } else {
              this.nextQuestion();
            }
          }, 1000); // Delay to show feedback
        });
      },
      nextQuestion() {
        this.currentQuestionIndex++;
        this.selectedOption = null;
  
        // Remove the correct/incorrect class for the next question
        this.$nextTick(() => {
          const buttons = document.querySelectorAll('.option-button button');
          buttons.forEach(button => {
            button.classList.remove('correct', 'incorrect');
          });
        });
      },
      finishQuiz() {
        this.finalScore = (this.score / this.questions.length) * 100; // Calculate final score percentage
        this.isQuizStarted = false; // Stop the quiz
        this.quizCompleted = true; // Mark quiz as completed
  
        // Set the quote based on the final score
        if (this.finalScore > 70) {
          this.quote = 'You are Brilliant.';
        } else {
          this.quote = 'Do more hard work.';
        }
      },
      goHome() {
        this.quizCompleted = false;
        this.selectedTopic = null; // Reset selected topic
      },
      isAnswerCorrect(option) {
        return this.userAnswers[this.currentQuestionIndex] &&
               this.userAnswers[this.currentQuestionIndex].selectedOption === option &&
               this.userAnswers[this.currentQuestionIndex].selectedOption === this.userAnswers[this.currentQuestionIndex].correctAnswer;
      },
      isAnswerIncorrect(option) {
        return this.userAnswers[this.currentQuestionIndex] &&
               this.userAnswers[this.currentQuestionIndex].selectedOption === option &&
               this.userAnswers[this.currentQuestionIndex].selectedOption !== this.userAnswers[this.currentQuestionIndex].correctAnswer;
      }
    },
    created() {
      this.fetchTopics();
    }
  };
  </script>
  
  <style scoped>
  /* General Styling */
  .quiz-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f7f9fc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
  }
  
  /* Topic Selection */
  .topic-selection {
    text-align: center;
    padding: 20px;
    background: #eef2f7;
    border-radius: 10px;
  }
  
  .topic-selection h2 {
    font-size: 1.8em;
    margin-bottom: 20px;
    color: #334e68;
  }
  
  .topic-selection select {
    padding: 10px;
    font-size: 1.1em;
    margin: 20px 0;
    width: 100%;
    border: 2px solid #334e68;
    border-radius: 5px;
    color: #334e68;
    background: white;
    transition: all 0.3s ease;
  }
  
  .topic-selection select:hover {
    border-color: #526b80;
  }
  
  .topic-selection button {
    padding: 12px 20px;
    font-size: 1.2em;
    margin-top: 20px;
    border: none;
    border-radius: 5px;
    background-color: #334e68;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  .topic-selection button:hover {
    background-color: #526b80;
  }
  
  /* Question Section */
  .question-section {
    padding: 20px;
    background: #eef2f7;
    border-radius: 10px;
    text-align: center;
  }
  
  .question-text {
    font-size: 1.5em;
    margin-bottom: 20px;
    color: #334e68;
  }
  
  .option-button button {
    display: block;
    margin: 10px 0;
    padding: 12px;
    width: 100%;
    font-size: 1.1em;
    border: 2px solid #334e68;
    border-radius: 5px;
    color: #334e68;
    background: white;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  .option-button button:hover {
    background-color: #eef2f7;
    border-color: #526b80;
  }
  
  .option-button button.correct {
    border-color: #4caf50; /* Green border for correct answers */
    background-color: #4caf50; /* Green background for correct answers */
    color: white;
  }
  
  .option-button button.incorrect {
    border-color: #f44336; /* Red border for incorrect answers */
    background-color: #f44336; /* Red background for incorrect answers */
    color: white;
  }
  
  /* Navigation Buttons */
  .navigation-buttons button {
    padding: 12px 20px;
    font-size: 1.1em;
    margin: 20px 10px;
    border: none;
    border-radius: 5px;
    background-color: #334e68;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  .navigation-buttons button:hover {
    background-color: #526b80;
  }
  
  /* Score Counter */
  .score-counter {
    text-align: center;
    margin-top: 20px;
    font-size: 1.4em;
    color: #334e68;
  }
  
  /* Results Section */
  .results-section {
    text-align: center;
    padding: 20px;
    background: #eef2f7;
    border-radius: 10px;
  }
  
  .results-section h2 {
    font-size: 2em;
    margin-bottom: 20px;
    color: #334e68;
  }
  
  .results-section p {
    font-size: 1.5em;
    color: #4caf50;
  }
  
  .results-section button {
    padding: 12px 20px;
    font-size: 1.2em;
    margin-top: 20px;
    border: none;
    border-radius: 5px;
    background-color: #334e68;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  .results-section button:hover {
    background-color: #526b80;
  }
  </style>
  