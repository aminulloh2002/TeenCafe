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
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        
                        <tr>
                            <td>No.</td>
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
                            
                        <tr v-for="(order, index) in orders" :key="index">
                            <td>{{index+1}}</td>
                             <td>{{order.name_customer}}</td>
                            <td>{{order.kabupaten}}</td>
                            <td>{{order.kecamatan}}</td>
                            <td>{{order.alamat}}</td>
                            <td><a :href="'https://api.whatsapp.com/send?phone='+order.no_hp">{{order.no_hp}}</a></td>
                            <td>{{order.total_price}}</td>
                            <td><button type="button" v-if="order.status_order == 'pending'" class="btn btn-success" @click="proses(order.id,index)">Proses</button>
                               <button type="button"  v-if="order.status_order == 'diproses'" class="btn btn-warning" @click="proses(order.id,index)">Bayar</button>
                               <button type="button"  v-if="order.status_order == 'dibayar'" class="btn btn-danger" @click="proses(order.id,index)">Selesai</button>
                                <router-link class="btn btn-primary" :to="'/order/detail/'+order.id">detail</router-link>
                               </td>
                           
                        </tr>                       
                  
                        </tbody>
                    </table>
                    
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
        orders:[]
    }
    },
    created() {
    this.loadData()
      this.interval()
  },
  methods:{
      loadData(){
        
              axios.get(window.location.origin+"/api/order/all").then(response => {
        // mengirim data hasil fetch ke varibale array Studentss
        this.orders = response.data;
        //console.log(response.data)
      })
      },
      interval(){
        setInterval(() => {    
                this.loadData()
                }, 10000);  
      },
      proses(id,index){
          axios.put(window.location.origin+"/api/order/proses/"+id).then(response =>{
                this.orders[index].status_order = response.data
          
            //console.log(JSON.stringify(this.orders, null, 2))
              }
          )
      }
   
          
        
      
  }
}
</script>