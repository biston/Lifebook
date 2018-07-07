<template>
        <div class="row justify-content-center">
            <div class="col-md-8">
                 yes
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
    return{

    }
  },
  mounted() {
    this.checkStatusWith(this.user.id);
  },
  methods: {
    checkStatusWith(user_id) {
      axios.get(`/profiles/status/${user_id}`).then(response => {
        console.log(response);
      }).catch ((error)=> console.log(error))
    }
  }
};
</script>

<style lang="sass" scoped>

</style>
