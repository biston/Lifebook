<!-- Vue component -->
<template>
<div>
  <multiselect
    v-model="value"
    :options="options"
    :multiple="true"
    track-by="library"
    :custom-label="customLabel"
    >
    </multiselect>
</div>
</template>

<script>
  import Multiselect from 'vue-multiselect'

export default {
  components: {
    Multiselect
  },
  data () {
    return {
  	value: [],
  	options: [
    	{	language: 'JavaScript', library: 'Vue.js' },
      { language: 'JavaScript', library: 'Vue-Multiselect' },
      { language: 'JavaScript', library: 'Vuelidate' }
    ]
    }
  },

  methods:{
      	customLabel (option) {
      return option.library
    }
  }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
