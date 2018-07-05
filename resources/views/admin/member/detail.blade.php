@extends('layouts.head')

@section('title','Members')

@section('section')


<style media="screen">
.table td {
 text-align: center;
}
</style>

<div id="app">

    <div class="container-fluid">
        <div class="widget-box">

            <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                <h5>Members</h5>
                
            </div>
            <div class="widget-content nopadding">

              <form @submit.prevent="addNew()" class="form-horizontal" >
                  {{ csrf_field() }}
                  <div class="control-group">
                      <label class="control-label">Amount :</label>
                      <div class="controls">
                          <input type="number" class="span6" v-model="donation.number"  required/>
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Date :</label>
                      <div class="controls">
                          <input type="date" name="date" value="" v-model="donation.date" required>
                      </div>
                  </div>
                  <div class="form-actions " style="margin-left: 200px">
                      <button type="submit" class="btn btn-success">Save</button>
                  </div>
                </form>

		<div v-if="update_show">
		<h3 style="margin-left:200px !important">Update Donation</h3>
		<hr>
		  <form @submit.prevent="updateDonation(update_donation.id)" class="form-horizontal" >
                  {{ csrf_field() }}
                  <div class="control-group">
                      <label class="control-label">Amount :</label>
                      <div class="controls">
                          <input type="number" class="span6" v-model="update_donation.money"  required/>
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Date :</label>
                      <div class="controls">
                          <input type="date" name="date" value="" v-model="update_donation.date" required>
                      </div>
                  </div>
                  <div class="form-actions " style="margin-left: 200px">
                      <button type="submit" class="btn btn-primary">Update</button>
		     <button type="button" @click="cancelUpdate" class="btn btn-danger">Cancale</button>
                  </div>
                </form>	
			 			
		</div>		

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                      <tr v-for="(donation,index) in donations">
                        <td>@{{donation.id}}</td>
                        <td>@{{donation.date}}</td>
                        <td>@{{donation.money}} Kyat</td>
                      <td>
                     	   <button  v-on:click="initUpdate(donation.id)" class="btn btn-success">Update</a>
                      </td> 
                      <td>
                     	   <button  v-on:click="deleteDonation(donation.id)" class="btn btn-danger">Delete</a>
                      </td> 

                      </tr>
                    </tbody>
                </table>
		
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
    new Vue({
      el:'#app',
      data:{
          donations:[],
	  update_donation:{date:'',money:'',id:''},
          donation:{
            number:'',
            date:'',
            id:'',
          },
	update_show:false
        },
        mounted(){
          this.getDonation();
        },
        methods:{
          getDonation(){
            let app=this;
            axios.get('http://bw.kspmyanmar.com/public/admin/member/donation/<?php echo $id; ?>').then((data) => {
            console.log(data.data.donation);
            this.donations = data.data.donation;
            });
          },
          addNew(){
            this.donation.id='<?php echo $id; ?>';
            axios.post('http://bw.kspmyanmar.com/public/admin/member/newDonation',{
              method:'POST',
              body:JSON.stringify(this.donation),
              header:{
                'content-type':'application/json'
              }
            }).then(data=>{
              this.donation.number='';
              this.donation.date='';
              this.donation.id='';
              this.getDonation();
            });
          },
          deleteDonation(id){
		if(confirm("Are you sure want to delete?")){
			axios.get('http://bw.kspmyanmar.com/public/admin/member/donation/delete/'+id).then(data=>{
			alert("Delete Success");
			this.getDonation();
			});
		 }
		},
	  initUpdate(id)
            {
		axios.get('http://bw.kspmyanmar.com/public/admin/member/donation/update/'+id).then(data=>{
			this.update_donation.id=data.data.donation.id;
			this.update_donation.money=data.data.donation.money;
			this.update_donation.date=data.data.donation.date;
			this.update_show=true;	
		});
            },
	updateDonation(id){
		axios.post('http://bw.kspmyanmar.com/public/admin/member/donation/update/'+id,{
			body:JSON.stringify(this.update_donation),
			 header:{
                'content-type':'application/json'
              }
		}).then(data=>{
			alert("Update Donation Success");
			this.update_show=false;
			this.getDonation();
			});	
		},
	cancelUpdate(){
		this.update_show=false;		
		}
		
        },
	
      });
</script>


@endsection
