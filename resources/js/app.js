require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');

import axios from 'axios';
import moment from 'moment';



let saveAd = {
  
    template: `<div>
    <button v-if="saveBtn" class="btn btn-info" @click.prevent="saveAd"><i class="fas fa-heart"></i>
    Save this ad</button>
    <p v-else class="alert alert-success">
    Advertisment Saved</p>
  </div>`,
  props: [
      'adId',
      'userId'
  ],
    data(){
      return {
         saveBtn:true,
        }
    },
  
    methods:{
  
      saveAd(){
          axios.post('/ad/save',{
              adId:this.adId,
              userId:this.userId
          }).then((response)=> {
            this.saveBtn= false
          }).catch((err)=>{
            alert('Error!')
          });
      }
  }
  }




let phoneNumber = {
  
  template: `<div>
  <p>
    <button class="btn btn-success" v-if="showBtn" @click.prevent="showPhoneBtn"><i class="fa-solid fa-phone"></i> Show Number</button>
  </p>
  <p v-if="showNumber">
    <button class="btn btn-danger">{{phoneNumber}}</button>
  </p>
</div>`,
props: [
    'phoneNumber'
],
  data(){
    return {
        showBtn: true,
        showNumber: false
      }
  },

  methods:{

    showPhoneBtn(){
        this.showNumber=true;
        this.showBtn=false
      }
  
}
}

let conversation = {
  template: ` 
  <div class="row">
  <div class="col-md-2">
  <p v-for="(user,index) in users" :key="index">
    <span v-if="user.avatar">
      <img :src=" '/storage/'+ (user.avatar.substring(7)) " width="80" style="border-radius:50% !important;">

    </span>
    <span v-else>
        <img :src=" '/img/man.jpg' " width="80" style="border-radius:50% !important;">
    </span>

      <a href="#" @click.prevent="showMessage(user.id)">
          <p>{{user.name}}</p>
      </a>
     
  </p>
  </div>
  <div class="col-md-10">
      <div class="card">
          <div class="card-header text-center">
              <span>Chat </span>
          </div>
          <div  v-if="selectedUserId"
              class="card-body chat-msg">
              <ul class="chat"  v-for="(message,index) in messages" :key="index"> 
             
                  <li class="sender clearfix" v-if="message.selfOwned" >
                   
                      <span class="chat-img left clearfix mx-2" v-if="message.user.avatar">
                          <img :src=" '/storage/'+ (message.user.avatar.substring(7)) " width="60">

                      </span>
                      <span class="chat-img left clearfix mx-2" v-else>
                          <img :src=" '/img/man.jpg'" width="60">

                      </span>
                      <div class="chat-body2 clearfix">
                          <div class="header clearfix">
                              <strong class="primary-font">
                                      
                               {{message.user.name}}
                              </strong>
                              <small class="right text-muted">
                                  <span
                                      class="glyphicon glyphicon-time"
                                  ></span
                                  >
                                 {{ moment(message.created_at).format("DD-MM-YYYY") }}

                                  </small
                              >
                          </div>
                          <p class="text-center" v-if="message.ads">
                              <a :href=" '/products/'+ message.ads.id+'/'+message.ads.slug " target="_blank">
                                  {{message.ads.name}}
                                  <img :src=" '/storage/'+ (message.ads.featured_image.substring(7)) " width="120">
                              </a>

                          </p>
          
                          <p
                          >
                          
             
                           {{message.body}}

                          </p>
                      </div>
                  </li>
                  <li class="buyer clearfix" v-else>
                      <span class="chat-img right clearfix  mx-2" v-if="message.user.avatar">
                         <img :src=" '/storage/'+ (message.user.avatar.substring(7)) " width="60">

                      </span>
                      <span class="chat-img right clearfix  mx-2" v-else>
                         <img :src=" '/img/man.jpg'" width="50">
                      </span>
                      <div class="chat-body clearfix">
                          <div class="header clearfix">
                              <small class="left text-muted"
                                  ><span
                                      class="glyphicon glyphicon-time"
                                  ></span
                                  >   {{ moment(message.created_at).format("DD-MM-YYYY") }}</small
                              >
                              <strong class="right primary-font">
                                 {{message.user.name}}
                              </strong>
                          </div>
                       <p class="text-center" v-if="message.ads">
                              <a :href=" '/products/'+ message.ads.id+'/'+message.ads.slug " target="_blank">
                                  {{message.ads.name}}
                                  <img :src=" '/storage/'+ (message.ads.featured_image.substring(7)) " width="120">
                              </a>

                          </p>
                          <p>
                                     
                            {{message.body}}
                          </p>
                      </div>
                  </li>
                  <li class="sender clearfix">
                      <span class="chat-img left clearfix mx-2"> </span>
                  </li>
              </ul>
          </div>
          <div style="min-height:250px;" v-else>
              <p class="text-center">Please select the user to chat.</p>
          </div>
        
          <div class="card-footer">
              <div class="input-group">
                  <input
                      v-model="body"
                      id="btn-input"
                      type="text"
                      class="form-control input-sm"
                      placeholder="Type your message here..."
                  />
                  <span class="input-group-btn">
                      <button
                          class="btn btn-primary"
                          @click.prevent="sendMessage()"
                        >
                          Send
                      </button>
                  </span>
              </div>
          </div>
      </div>
  </div>
</div>
`,
  data(){
    return{
        users:[],
        messages:[],
        selectedUserId:'',
        body:'',
        moment:moment,
    }
  },
    async created(){

    await axios.get('/users').then((response)=>{
          this.users = response.data
      })
      setInterval(()=>{
          this.showMessage(this.selectedUserId)
      },1000)
    
     
  },
  methods:{
      showMessage(userId){
          axios.get('/message/user/'+userId).then((response)=>{
              this.messages = response.data
              this.selectedUserId = userId
              
          })

      },
      sendMessage()
      {
          if(this.body==''){
              alert('Please write your message')
              return
          }
          if(this.selectedUserId==''){
           alert('Please select the user')
              return   
          }
          
          axios.post('/start-conversation',{
              body:this.body,
              receiverId: this.selectedUserId
          }).then((response)=>{
              this.messages.push(response.data);
              this.body=''
          })
      }
  },

// created(){



}


let subcategoryDropdown = {
  
  template: '<div class="col-md-4"> <select @change="getSubcategories" class="form-control" name="category_id" v-model="category" > <option value=""> choose category</option> <option v-for="data in categories" :value="data.id" :key="data.id">{{data.name}}</option> </select> </div> <div class="col-md-4"> <select @change="getChildcategories" class="form-control" name="subcategory_id" v-model="subcategory" v-bind="$props"> <option value="">choose subcategory</option> <option v-for="data in subcategories" :value="data.id" :key="data.id">{{data.name}}</option></select></div><div class="col-md-4"> <select class="form-control" name="childcategory_id" v-model="childcategory"> <option value="">choose childcategory</option> <option v-for="data in childcategories" :value="data.id" :key="data.id">{{data.name}}</option></select></div>',

  data(){
      return{  
        subcategory:0,
        subcategories:[],
        category: 0,
        categories:[],
        childcategory:0,
        childcategories:[],
      
      }
  },

  mounted(){
   
     axios.get('/api/category').then((response)=>{
      this.categories = response.data
    
  }).bind(this)
},
    
  methods:{

    getSubcategories(){
        axios.get('/api/subcategory',{params:{category_id:this.category}}).then((response)=>{
            this.subcategories =response.data
        }).bind(this)
    },

    getChildcategories(){
      axios.get('/api/childcategory',{params:{subcategory_id:this.subcategory}}).then((response)=>{
          this.childcategories =response.data
      }).bind(this)
  }
  
}
}



let addressDropdown = {
  
  template: '<div class="col-md-4"> <select @change="getstates" class="form-control" name="country_id" v-model="country" > <option value=""> choose country</option> <option v-for="data in categories" :value="data.id" :key="data.id">{{data.name}}</option> </select> </div> <div class="col-md-4"> <select @change="getcities" class="form-control" name="state_id" v-model="state" v-bind="$props"> <option value="">choose state</option> <option v-for="data in states" :value="data.id" :key="data.id">{{data.name}}</option></select></div><div class="col-md-4"> <select class="form-control" name="city_id" v-model="city"> <option value="">choose city</option> <option v-for="data in cities" :value="data.id" :key="data.id">{{data.name}}</option></select></div>',

  data(){
      return{  
        state:0,
        states:[],
        country: 0,
        categories:[],
        city:0,
        cities:[],
      
      }
  },

  async created(){
   await axios.get('/api/country').then((response)=>{
      this.categories = response.data
    
  }).bind(this)
     
},
    
  methods:{

    getstates(){
        axios.get('/api/state',{params:{country_id:this.country}}).then((response)=>{
            this.states =response.data
        }).bind(this)
    },

    getcities(){
      axios.get('/api/city',{params:{state_id:this.state}}).then((response)=>{
          this.cities =response.data
      }).bind(this)
  }
  
}
}





const { createApp } = Vue

createApp({

  components: { 'subcategory-component':subcategoryDropdown,  'address-dropdown':addressDropdown , 'show-conversation':conversation, 'phone-number':phoneNumber, 'save-ad':saveAd},
  
})



.component('message-component', {
  template: ` <div>
  <p v-if="showViewConversationOnSuccess">
  <button
      type="button"
      class="btn btn-danger"
      data-toggle="modal"
      data-target="#staticBackdrop"
  >
  <i class="fas fa-envelope"></i>   Send Message
  </button>
  </p>
  <p v-else>
  <a href="/messages">
  <button
      type="button"
      class="btn btn-success"

  >
    <i class="fas fa-paper-plane"></i> View Conversation
  </button>
   </a>
  </p>
 
   
 
  <!-- Modal -->
  <div
      class="modal fade"
      id="staticBackdrop"
      data-backdrop="static"
      data-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
  >
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content ">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">
                      Send message to {{ sellerName }}
                  </h5>
                  <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                  >
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <textarea
                      v-model="body"
                      class="form-control"
                      placeholder="Please write your message..."
                  ></textarea>
                <p v-if="successMessage" style="color:green">Your message has been sent.</p>
              </div>
              <div class="modal-footer">
                  <button
                      type="button"
                      class="btn btn-secondary"
                      data-dismiss="modal"
                  >
                      Close
                  </button>
                  <button
                      type="button"
                      class="btn btn-danger"
                      @click.prevent="sendMessage()"
                  >
                      Send message
                  </button>
              </div>
          </div>
      </div>
  </div>
</div>`,
  props:[
    'sellerName',
    'userId',
    'receiverId',
    'adId'
  ],
  data() {
    return {
        body: "",
        successMessage:false,
        showViewConversationOnSuccess:true
    };
},
// created(){

// },
methods: {
  sendMessage()
  {
      if(this.body==''){
          //alert('please write your message')
          this.$toaster.warning('please write your message.', {timeout: 8000})

          return;

      }
      axios.post('/send/message',{
          body:this.body,
          receiverId:this.receiverId,
          userId:this.userId,
          adId:this.adId
      }).then((response)=>{
          this.body=''
          this.successMessage=true,
          this.showViewConversationOnSuccess=false
      })
  }
}

})



//hello world
.component('user-component', {
          template: '<h2> Hello world view component here there<h3>'
      })


//featured image components
.component('featured-image',{
          template: '<div><input type="file" name="featured_image" @change="onFileChange" class="custom-file-upload" required="" accept="image/*"><div id="preview"><img v-if="url" :src="url" width="100" height="60"></div></div>',
          data(){
            return{  
              url:''
            }
        },
        methods:{
        onFileChange(e){
         const file = e.target.files[0];
         this.url =URL.createObjectURL(file)
      },
      },
  })

//featured image components
.component(  'first-image', {
          template: '<div><input type="file" name="first_image" @change="onFileChange" class="custom-file-upload" required="" accept="image/*"><div id="preview"><img v-if="url" :src="url" width="100" height="60"></div></div>',
          data(){
            return{  
              url:''
            }
        },
        methods:{
        onFileChange(e){
         const file = e.target.files[0];
         this.url =URL.createObjectURL(file)
      },
      }
     })


.component( 'second-image', {
      template: `<div><input type="file" name="second_image" @change="onFileChange" class="custom-file-upload" required="" accept="image/*"><div id="preview"><img v-if="url" :src="url" width="100" height="60"></div></div>`,
      data(){
        return{  
          url:''
        }
    },
    methods:{
    onFileChange(e){
     const file = e.target.files[0];
     this.url =URL.createObjectURL(file)
  },
  }
 



}).mount('#app')