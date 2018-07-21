<template>
        <div class="row justify-content-center status-panel">
            <div class="col-md-12">
                <a href="#" @click.prevent="acceptFriend(user)" class="btn btn-success" v-if="status=='PENDING_FROM'"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Accept friend</a>
                <a href="#" @click.prevent="refuseFriend(user)" class="btn btn-danger" v-if="status=='PENDING_FROM'"><i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>Refuse friend</a>
                <a href="#" @click.prevent="cancelRequest(user)" class="btn btn-danger" v-if="status=='PENDING_TO'"><i class="fa fa-ban mr-1" aria-hidden="true"></i>Cancel request</a>
                <a href="#" @click.prevent="addFriend(user)" class="btn btn-primary" v-if="status=='UNKNOWN'"><i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>Add friend</a>
                <div class="dropdown" v-if="status=='FRIENDS'">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Friends
                    </a>
                  <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#" @click.prevent="declineFriend(user)"><i class="fa fa-trash mr-1" aria-hidden="true"></i>Delete</a>
                  </div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
  props: {
    user: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      status: ""
    };
  },
  mounted() {
    this.checkStatusWith(this.user)
  },
  methods: {
    checkStatusWith(user) {
      axios
        .get(`/profiles/status/${user.id}`)
        .then(response => {
          this.status = response.data.status;
        })
        .catch(error => console.log(error));
    }
     ,
    addFriend(user){
      axios
          .post(`/friendships/add/${user.id}`)
          .then(response=>{
            if (response.data==1) {
              this.status='PENDING_TO'
            }
          })
          .catch(error => console.log(error));
    },
    refuseFriend(user){
      axios
          .delete(`/friendships/refuse/${user.id}`)
          .then(response=>{
            if (response.data==1) {
              this.status='UNKNOWN'
            }
          })
          .catch(error => console.log(error));
    },
    acceptFriend(user){
      axios
          .put(`/friendships/accept/${user.id}`)
          .then(response=>{
            if (response.data==1) {
              this.status='FRIENDS'
            }
          })
          .catch(error => console.log(error));
    },
    declineFriend(user){
      axios
          .delete(`/friendships/decline/${user.id}`)
          .then(response=>{
            if (response.data==1) {
              this.status='UNKNOWN'
            }
          })
          .catch(error => console.log(error));
    },
    cancelRequest(user){
      axios
          .delete(`/friendships/cancel/${user.id}`)
          .then(response=>{
            if (response.data==1) {
              console.log(response.data);
              this.status='UNKNOWN'
              console.log(response.data);
            }
          })
          .catch(error => console.log(error));
    },
  }
};
</script>

<style  scoped>
   .status-panel{
     border:none;
     margin: 20px 0 10px;
     display: flex;
     justify-content: center;
   }
.btn{
    border-radius: 0px !important;
    color: white;
     width: 200px !important;;
    font-weight: bold;
}
</style>
