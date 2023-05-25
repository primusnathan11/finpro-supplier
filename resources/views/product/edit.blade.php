@include('template.header')
@include('template.sidebar')
@include('template.topbar')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Validation - Regular Style</h4>
            <div class="nk-block-des">
                <p>Validating your form, just add the class <code class="code-class">.form-validate</code> to any <code class="code-tag">&lt;form&gt;</code>, then it validate the form show error message.</p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-inner">
            <form action="{{ route('update.product', $product->id)}}" class="form-validate" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row g-gs">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="fv-subject">Product Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="fv-subject" name="product_name" required value="{{$product->product_name}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="default-06">Image</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" multiple class="form-file-input" id="customFile" name="image">
                                    <label class="form-file-label" for="customFile"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-full-name">Price</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-left">
                                    Rp
                                </div>
                                <input type="number" class="form-control" id="default-03" placeholder="Input price" name="price" value="{{$product->price}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-phone">Stock</label>
                            <div class="form-control-wrap">
                                <div class="input-group">
                                    <input type="number" class="form-control" required name="stock" value="{{$product->stock}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Add new product</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- .nk-block -->

@include('template.footer')
