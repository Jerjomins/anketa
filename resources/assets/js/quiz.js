window.Vue = require('vue');
new Vue({
    el: '#question',
    data: {
        questions: theQuestions,
        currentQuestion: null,
        selected: false,
        answers: {},
        getAnswersUrl: getAnswers,
        qusetionId: 0,
    },

    beforeMount () {
        this.setQuestion(this.qusetionId);
        this.getAnswers();
    },

    methods: {
        setQuestion (questionId) {
            this.currentQuestion = this.questions[questionId];
        },

        /**
         * Init question, and set for next question onclick
         * @returns {*}
         */
        nextQuestion () {
            this.setQuestion(this.qusetionId++);
            this.selected = false;
            return this.getAnswers();
        },

        /**
         * Get answers for current question
         */
        getAnswers () {
            axios.post(this.getAnswersUrl, {
                question_id: this.currentQuestion.id,
                quiz_id: this.currentQuestion.quiz_id
            }).then(response => {
                this.answers = response.data;
            }).catch(error => {
                console.log(error);
            });
        },
    }
});
