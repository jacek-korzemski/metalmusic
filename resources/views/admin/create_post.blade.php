@extends('admin.layout')

@section('center')
<form class="default-form">
    <div class="row no-gutters">
        <div class="col-7">
            <div class="row no-gutters">
                <div class="col-6">
                    <label for="title">Tytuł:</label>
                    <input type="text" name="title" id="title" placeholder="Tytuł" />
                </div>
                <div class="col-6">
                    <label for="title">Kategoria:</label>
                    <select name="kategoria" id="category">
                        <option value="Kategoria 1">Kategoria 1</option>
                        <option value="Kategoria 2">Kategoria 2</option>
                        <option value="Kategoria 3">Kategoria 3</option>
                        <option value="Kategoria 4">Kategoria 4</option>
                        <option value="Kategoria 5">Kategoria 5</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="url_preview">Podgląd adresu URL:</label>
                    <input type="text" name="url_preview" id="url-preview" readonly />
                </div>
                <div class="col-12 text-area">
                    <label for="content">Treść: </label>
                    <div id="content"></div>
                </div>
                <div class="col-12">
                    <input type="submit" value="Dodaj post" class="btn btn-primary" />
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="row no-gutters">
                <div class="col-12">
                    <label>Dodaj grafikę</label>
                    <input type="file" name="thumbnail" />
                </div>
                <div class="col-12">
                    <label>Grafiki</label>
                    <div id="images">
                        {{-- @{{test}} --}}
                    </div>
                </div>
            </div>
        </div>
</form>
@endsection

@section('scripts')
<script src="/js/vue.js"></script>
<script>
    const ImagesApp = {
        data(){
            return {
                test: 'It\'s working!',
            }
        },
        methods: {
            openFolder(path) {
                return 'siemano';
            }
        }
        created() {
            this.test = 'Hello world!';
        }
    }
    Vue.createApp(ImagesApp).mount('#images');
</script>
<script>
    let formElements = document.querySelectorAll('form input');
    formElements = [...formElements, ...document.querySelectorAll('form select')];

formElements.map((elem) => {
    elem.addEventListener('change', function(){
        let url = document.getElementById('url-preview');
        let value = document.getElementById('title').value;
        value = value.replace(/(^\-+|[^a-zA-Z0-9_| -]+|\-+$)/g, '').toLowerCase().replace(/[_| -]+/g, '-');
        value = document.getElementById('category').value + "/" + value;
        url.value = value
    })
});
</script>
<script src="/js/pell.js"></script>
<script>
    pell.init({
  element: document.getElementById('content'),
  onChange: html => null,
  defaultParagraphSeparator: 'p',
  styleWithCSS: false,
  actions: [
    'heading1',
    'heading2',
    'bold',
    'italic',
    'underline',
    'quote',
    'olist',
    'ulist',
    'link'
  ],
  classes: {
    actionbar: 'pell-actionbar',
    button: 'pell-button',
    content: 'pell-content',
    selected: 'pell-button-selected'
  }
})
</script>
<?php if (isset($content) && $content != "") { ?>
<script defer>
    document.querySelector('#content .pell-content').innerHTML = '<?php echo $content; ?>';
</script>
<?php } ?>
@endsection