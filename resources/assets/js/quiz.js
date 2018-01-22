window.Vue = require('vue');
new Vue({
    el: '#question',
    data: {
        questions: theQuestions,
        currentQuestion: null,
        selected: false,
        answers: {},
        getAnswersUrl: getAnswers,
        question_id: 0,
    },

    beforeMount: function () {
        this.nextQuestion();
    },

    methods: {
        /**
         * Init question, and set for next question onclick
         * @returns {*}
         */
        nextQuestion: function () {
            this.currentQuestion = this.questions[this.question_id++];
            this.selected = false;
            return this.getAnswers();
        },

        /**
         * Get answers for current question
         */
        getAnswers: function () {
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
