window.Vue = require('vue');

new Vue({
    el: '#question',
    data: {
        user: theUser,
        questions: theQuestions,
        currentQuestion: null,
        selected: false,
        answers: theAnswers,
        getAnswersUrl: getAnswersRoute,
        saveAnswerUrl: saveAnswerRoute,
        finishQuizUrl: finishQuizRoute,
        progressBar: 0,
        progressBarStep: 0,
        qusetionId: 0,
        errors: [],
        showError: false,
        loading: false,
    },

    beforeMount () {
        this.setQuestion(this.qusetionId);
        this.progressBarStep = 100 / this.questions.length;
    },

    methods: {
        /**
         * Show next question
         * @returns {boolean}
         */
        nextQuestion () {
            this.loading = true;
            this.setQuestion(++this.qusetionId);
            this.saveAnswer();
            this.getAnswers();
            return this.selected = false;
        },

        /**
         * Set current or next question
         * @param questionId
         */
        setQuestion (questionId) {
            /** Check if we have one more question */
            if(typeof this.questions[questionId] === 'undefined'){
                return this.finishQuiz();
            }

            return this.currentQuestion = this.questions[questionId];
        },

        /**
         * get answers via post request
         */
        getAnswers () {
            this._clearErrors();
            axios.post(this.getAnswersUrl, {
                question_id: this.currentQuestion.id,
                quiz_id: this.currentQuestion.quiz_id,
                answer_id: this.selected,
            }).then(response => {
                this.answers = response.data;
                this.setProgressBar();
                this.showError = false;
                this.loading = false;
            }).catch(error => {
                this.setQuestion(--this.qusetionId);
                this.fetchErrors(error.response.data.errors);
                this.showError = true;
                this.loading = false;
            });
        },

        /**
         * Fetch errors
         * @param errors
         */
        fetchErrors (errors) {
            Object.keys(errors).forEach(error => {
                this.errors.push(errors[error]);
            });
        },

        /**
         * save each answer to database
         */
        saveAnswer () {
            axios.post(this.saveAnswerUrl, {
                user_id: this.user.id,
                question_id: this.currentQuestion.id,
                quiz_id: this.currentQuestion.quiz_id,
                answer_id: this.selected,
            }).then(response => {
                console.log(response.data);
            }).catch(error => {
                this.fetchErrors(error.response.data.errors);
                this.loading = false;
                this.showError = true;
            });
        },

        setProgressBar () {
            return this.progressBar += this.progressBarStep;
        },

        /**
         * save quiz results after last question
         */
        finishQuiz () {
            axios.post(this.finishQuizUrl, {
                user_id: this.user.id,
            }).then(response => {
                window.location.href = response.data.redirect;
            }).catch(error => {
                this.fetchErrors(error.response.data.errors);
                this.loading = false;
                this.showError = true;
            });
        },

        /**
         * Clear errors
         * @private
         */
        _clearErrors() {
            this.errors = [];
        }
    }
});
