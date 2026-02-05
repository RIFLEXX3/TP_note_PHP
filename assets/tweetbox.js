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
            photo : this.photo ? 'https://picsum.photos/50/50?random=' + Math.random() : false,     
        });
        this.text = ''; // remet l'interface à zéro après l'envoi du tweet
        this.photo = false; // remet l'interface à zéro après l'envoi du tweet
    }
  },

// methods: {
//     tweeter() {
//         let tweet = {
//             text : this.text,
//         };
//         if (this.photo) {
//             tweet.photo = 'https://picsum.photos/200/200?random=' + Math.random();
//         }
//         this.tweet.push(tweet); 
//     }
// },

}).mount('#app');