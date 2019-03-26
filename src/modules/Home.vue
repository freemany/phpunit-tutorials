<template>
  <div class="home">
    <SlideShow/>
  </div>
</template>

<script>
// @ is an alias to /src
import SlideShow from '@/components/SlideShow'

export default {
  name: 'home',
  components: {
    SlideShow
  }
}
</script>
