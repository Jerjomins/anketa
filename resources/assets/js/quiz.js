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

    beforeMount () {
        this.nextQuestion();
    },

    methods: {
        nextQuestion () {
            this.getQuestion();
            this.getAnswers();
        },

        /**
         * Get current question
         */
        getQuestion () {
            this.currentQuestion = this.questions[this.question_id++];
            this.selected = false;
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
