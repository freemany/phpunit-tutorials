<template>
  <div class="container">
    <div>
      <h5>Tutorial 1</h5>
      <div class="jumbotron p-3 p-md-5 rounded ol-md-6 px-0" v-html="content" id="code">
      </div>
    </div>
    <button @click="prev">prev</button><button @click="next">next</button>
  </div>
  </template>

<script>
import config from '@/config/slideshow.js';

let index = 0;

export default {
  name: 'HelloWorld',
  props: {
    msg: String
  },
  data() {
      return {
          index: 0,
          content: config[index].content
      }
  },
  mounted() {
    this.initCode();
  },
  methods: {
      initCode() {
          $('#code').find('code').each(function() {
              hljs.highlightBlock(this);
              // hljs.highlightAuto($(this).text(), {language: 'php'});
          });
      },
      next() {
          if (index === config.length - 1) {
              return;
          }
          index ++;
          this.content = config[index].content;
          this.$nextTick(() => {
              this.initCode();
          });
      },
      prev() {
          if (index === 0) {
              return;
          }
          index --;
          this.content = config[index].content;
          this.$nextTick(() => {
              this.initCode();
          });
      },
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
#code {
  text-align: left;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
