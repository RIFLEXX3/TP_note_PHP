Vue.createApp({
  data() {
    return {
        text : '',
        max: 140,
        photo : false,
        tweet : []
    };
  },
  
  computed: {
    nombreRestants() {
        if (this.photo) {
            return this.max - 40 - this.text.length;
        } else {
            return this.max - this.text.length;
        }
    },
    limiteAtteinte() {
        if (this.nombreRestants < 0) {
            return true;
        } else {
            return false;            
        }
    },
    labelPhoto() {
        if (this.photo) {
            return "Photo ajoutée";
        } else {
            return "Pas de photo";
        }
    },
  },

  methods: {
    tweeter() {
        this.tweet.push({
            text : this.text,
            photo : this.photo        
        });
        this.text = '';
        this.photo = false;
    }
  },
}).mount('#app');