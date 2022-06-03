


<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- CK EDITOR -->
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
                CKEDITOR.replace( 'editor1' );
        </script>

<script type="text/javascript">
        $(document).ready(function(){
            $('#select_all').click(function(){
                if(this.checked){
                    $('.multi_check').each(function(){
                        this.checked=true;
                    })
                }else{
                    $('.multi_check').each(function(){
                        this.checked=false;
                    })
                }

            })
        })
</script>
</body>

</html>
