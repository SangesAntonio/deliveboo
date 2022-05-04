<div class="loader">
    <div class="w-50 text-light" role="status">
      <img :src="'./storage/deliberoo-loader.gif'" alt="" />
    </div>
  </div>
</template>
<script>
export default {
  name: "Loader",
};
</script>
<style scoped lang='scss'>
.loader {
  position: fixed;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%) rotate(-18deg);
}
</style>

