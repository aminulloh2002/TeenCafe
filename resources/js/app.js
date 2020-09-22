require('./bootstrap');
import Vue from 'vue'
import VueAxios from 'vue-axios'
import Axios from 'axios'

Vue.use(VueAxios,Axios)

new Vue({
    el:'.vue',
    delimiters: ["${","}"],
    data(){
        return{
        datas: [],
        products:[],
        session:[],
        locals:[],
        cqty:1,
        total: 0,
        totalcart:0,
        errors:false,
        namapemesan:'',
        kabupaten:'malang',
        kecamatan:'',
        detailalamat:'',
        nohp:'',
        dmodal:{
          id: '',
          name: '',
          price:'',
          qty:[],
          status:'',
          description: '',
          image:'image/product/20200823163034.png',
          variant:'',
          sub_variant:'',
        },
        showm:'',
        showc:''
     }
    },
    created() {
      this.loadData();
    
    },
    methods: {
      
      loadData() {
        // fetch data dari api menggunakan axios
        axios.get(window.location.origin +"/api/product").then(response => {
          this.products = response.data
          this.locals = JSON.parse(localStorage.getItem('history'))
          this.loadcart()
        })
      },
      loadcart(){
        axios.get(window.location.origin +"/api/cart").then(response => {
          this.session = response.data
          this.totalpesanan
          this.totalharga
          this.history()
        })
        // console.log(JSON.stringify(this.products, null, 2))
      },
      history(){
        axios.post(window.location.origin+"/api/history",{
          history:JSON.parse(localStorage.getItem('history'))
        }).then(response =>{
         this.datas = response.data
        })
      },
     
      modal(index){
        this.cqty = 1
        this.dmodal.id = this.products[index].id
        this.dmodal.name = this.products[index].name
        this.dmodal.price = this.products[index].price
        this.dmodal.qty = this.products[index].qty
        this.dmodal.description = this.products[index].description
        this.dmodal.image = "image/product/"+this.products[index].image
        this.showmodal()
      },
      deletecart(id){
        axios.delete(window.location.origin +"/api/cart/" + id).then(response =>{
          this.session = response.data
          this.totalpesanan
          this.totalharga
        })
      },
      order(cqt){
        axios.post(window.location.origin+"/api/cart",{
          id: this.dmodal.id,
          cqty:cqt
        }).then(response =>{
          this.hidemodal()
          this.session = response.data
          this.totalharga
          this.totalpesanan
          // console.log(JSON.stringify(this.session, null, 2))
        })
      },
  
      qi(qty){
        if(this.cqty >=qty ){
           this.cqty == qty
        } else{
           this.cqty +=1
        }
      },
      qd(){
        if(this.cqty <=1 ){
           this.cqty == 1
        } else{
           this.cqty -=1
        }
      },

      hidemodal(){
         this.showm = ''
      },
      checkplaceorder(){
        if (this.namapemesan == '' || this.nohp == '' || this.detailalamat == '' || this.kecamatan == '') {
          return this.errors = true
        } else {
          this.placeorder()
        }
      },
      placeorder(){
        let nohp = ''
        if(this.nohp.charAt(0) == '0'){
         nohp = this.nohp.replace('0','+62')
        }else{
          nohp = this.nohp
        }
        console.log(nohp)
        axios.post(window.location.origin+"/api/placeorder",{
          ordername:this.namapemesan,
          kabupaten:this.kabupaten,
          kecamatan:this.kecamatan,
          nohp:nohp,
          alamat:this.detailalamat,
          total_price:this.total
        }).then(response =>{
          //this.locals.unshift(response.data)
          //localStorage.setItem('history',JSON.stringify(this.locals))
          let a = [response.data]
          a.push(JSON.parse(localStorage.getItem('history')))
          localStorage.setItem('history',JSON.stringify(a))
          this.$refs.close.click()
          this.session = null
          this.totalcart = 0
          this.total = 0
          this.history()
         
        })
      },
      showcart(){
        return this.showc = 'show-header-cart'
      },
      hidecart(){
        return this.showc = ''
      },
      showmodal(){
        this.showm = 'show-modal1'
     },

    },
    computed:{
      totalpesanan(){
      
        this.totalcart = 0;
      
        Object.entries(this.session).forEach(([key, val]) => {
            return this.totalcart+=val.cqty // the value of the current key.
        });  
      },
    
     totalharga(){

      this.total = 0;
    
      Object.entries(this.session).forEach(([key, val]) => {
        let kali = val.price * val.cqty
           this.total+=kali // the value of the current key.
      });
    
     
    },
    },
      // filters: {
        
        // cparse(data){
        //   let arr = JSON.parse(data)
        //   return "" + arr
        // },
        // iparse(data){
        //   return "image/product/"+data
        // },
        // mparse(data){
        //   return "image/product/"+data
        // },


      //}
     
});