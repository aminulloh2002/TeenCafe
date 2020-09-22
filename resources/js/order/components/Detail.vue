<template>
<div class="row">
    <div class="col-lg-12">
        <div class="panel ">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="ti-list"></i> Orders
                </h3>
                <span class="pull-right">
                        <i class="fa fa-fw ti-angle-up clickable"></i>
                    </span>
            </div>
            <div class="panel-body">
        
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped ">
                        <thead>
                            <h4>Detail Pemesan</h4>
                        <br>  
                        <tr>
                            <th>Nama pemesan</th>
                            <th>Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Alamat</th>
                            <th>Whatsapp/Hp</th>
                            <th>Total Bayar</th>
                            <th>Action</th> 
                        </tr>
                        </thead>
                       
                        <tbody>
                            
                        <tr >
                            <td>{{pemesan.name_customer}}</td>
                            <td>{{pemesan.kabupaten}}</td>
                            <td>{{pemesan.kecamatan}}</td>
                            <td>{{pemesan.alamat}}</td>
                            <td><a :href="'https://api.whatsapp.com/send?phone='+pemesan.no_hp">{{pemesan.no_hp}}</a></td>
                            <td>{{pemesan.total_price}}</td>
                            <td><button type="button" v-if="pemesan.status_order == 'pending'" class="btn btn-success" @click="proses(pemesan.id)">Proses</button>
                               <button type="button"  v-if="pemesan.status_order == 'diproses'" class="btn btn-warning" @click="proses(pemesan.id)">Bayar</button>
                               <button type="button"  v-if="pemesan.status_order == 'dibayar'" class="btn btn-danger" @click="proses(pemesan.id)">Selesai</button></td>
                        </tr>
                  
                        </tbody>
                         </table>
                        <br>
                        <h4>Detail Pesanan</h4>
                        <br>
                        <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        
                        <tr>
                            <th>#</th>
                            <th>Nama Product</th>
                            <th>Jumlah</th> 
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                        <tr v-for="(detail, index) in details" :key="index">
                            <td>{{index+1}}</td>
                            <td>{{detail.name}}</td>
                            <td>{{detail.qty}}</td>
                        </tr>
                  
                        </tbody>
                    </table>
                     <a class="btn btn-primary"  style="float:right;" href="/order/pending">Kembali</a>
                    
                </div>
        
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
    return {
        details:[],
        orders:[],
        pemesan:[]
    }
    },

    
    created() {
    this.loadData()
    this.loadDataOrder()
  },
  methods:{
      loadData(){
           axios.get(window.location.origin+"/api/order/detail/"+ this.$route.params.id).then(response => {
        // mengirim data hasil fetch ke varibale array Studentss
        this.details = response.data
      })
      },
        loadDataOrder(){
        
              axios.get(window.location.origin+"/api/order/all").then(response => {
        // mengirim data hasil fetch ke varibale array Studentss
        this.orders = response.data;
        this.arrfil()
        
      })},
      arrfil(){
          let order = this.orders.find(order=> order.id == this.$route.params.id);
          this.pemesan = order
         
      },
      proses(id){
          axios.put(window.location.origin+"/api/order/proses/"+id).then(response =>{
        
                this.pemesan.status_order = response.data
            //console.log(JSON.stringify(this.orders, null, 2))
              }
          )
      }
      },
  }

</script>