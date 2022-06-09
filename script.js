

const app = new Vue({
  el: '#app',

  data:{
    apiUrl: 'http://localhost/php-json/pizza-json.php?prezzo=',
    pizze:[],
    error_msg: '',
    success : true,
    prezzo:''
  },
  mounted() {
    this.getApi()
  },

  methods: {
    getApi(){
      axios.get(this.apiUrl + this.prezzo)
      .then(response =>{
        this.pizze = response.data.pizze;
        this.success = response.data.success;
        this.error_msg = response.data.error_msg;
        console.log(response.data.pizze);
      })
    }
  },
})