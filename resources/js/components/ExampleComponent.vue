<template>
<div>Hola {{ nombres }}</div>
</template>
<script>
export default {
	props: ["nombres"],
  data() {
    return {
      nombre:'Anthony',
    }
  },
  
}
</script>
