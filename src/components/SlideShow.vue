<template>
  <div class="container">
    <div>
      <h5>Tutorial 1</h5>
      <div class="jumbotron p-3 p-md-5 rounded ol-md-6 px-0" v-html="content" ref="slideContent">
      </div>
    </div>
    <button class="btn btn-primary" @click="prev"><i class="fas fa-angle-left"></i></button> {{index + 1}} of {{total}}  <button class="btn btn-primary" @click="next"><i class="fas fa-angle-right"></i></button>
  </div>
  </template>

<script>
import config from '@/config/slideshow.html';
import hljs from 'highlightjs';
import {getProgressPageIndex, setProgressPageIndex} from '@/lib/localstorage';


export default {
  name: 'SlideShow',
  props: {
    msg: String
  },
  data() {
      return {
          total: 0,
          index: 0,
          content: null,
      }
  },
  created() {
      this.total = config.length;
      this.index = getProgressPageIndex();
      this.content = config[this.index];
  },
  mounted() {
    this.initCode();
  },
  methods: {
      initCode() {
          this.$refs.slideContent.querySelectorAll('pre code').forEach((block) => {
              hljs.highlightBlock(block);
          });
      },
      next() {
          if (this.index === this.total - 1) {
              return;
          }
          this.index ++;
          this._goPage();
      },
      prev() {
          if (this.index === 0) {
              return;
          }
          this.index --;
          this._goPage();
      },
      _goPage() {
          setProgressPageIndex(this.index);
          this.content = config[this.index];
          this.$nextTick(() => {
              this.initCode();
          });
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.jumbotron {
  text-align: left;
  height: 500px;
  overflow-y: scroll;
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
