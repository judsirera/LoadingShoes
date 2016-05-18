{$modules.head}

<section id="newproduct">
    <div class="container extra-margin-top">
        <div class="row box">
            <form method="POST" enctype="multipart/form-data">
                <div class="col s12">
                    <div class="row">
                        <div class="col s6 offset-s3">
                            <h1>New product</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 offset-s3">
                            {if $error_msg}
                                <div class="col s12 error-message borders-box">
                                    <p>{$error_msg}</p>
                                </div>
                            {/if}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="row">
                                <div class="col s12">
                                    <div id="uploadshoesfoto">
                                        {if $photo}
                                            <img id="imgFile" class="img-responsive" src="{$photo}" alt="" />

                                        {else}
                                            <img id="imgFile" class="img-responsive" src="{$url.global}/imag/uploadFotoShoes.png" alt="" />
                                        {/if}
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div id="fileInput" class="file-field input-field">
                                        <div style="height: 3rem" class="btn waves-effect waves-light btn-large">
                                            <span>File (*)</span>
                                            <input id="fileName" name="fileName" type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            {if $photo_name}
                                                <input class="file-path validate" type="text" value="{$photo_name}">
                                            {else}
                                                <input class="file-path validate" type="text">
                                            {/if}
                                            <span class="instructions right">2MB max.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="width: 95%; margin-left: 2.5%" class="row">
                                <div class="input-field col s4">
                                    <input name="price" id="price" type="number" class="validate" min="1" max="1000" value="{$price}" required>
                                    <label for="price">Price (*)</label>
                                    <span class="instructions right">Coin: €</span>
                                </div>
                                <div class="input-field col s4">
                                    <input name="quantity" id="quantity" type="number" class="validate" min="1" max="1000" value="{$quantity_value}" required>
                                    <label for="quantity">Quantity (*)</label>
                                </div>
                                <div class="input-field col s4">
                                    <input name="limit_date" type="text" id="datepicker" class="validate" value="{$limit_date}" required>
                                    <label for="datepicker">Data caducitat (*)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="product_name" id="product_name" type="text" class="check" maxlength="50" value="{$product_name}" required>
                                    <label for="product_name" data-error="wrong" data-success="right">Product name (*)</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 extra-margin-top">
                                    <textarea name="description_product" id="description_product">{$description_product}</textarea>
                                    <label class="less-margin-top" for="description_product">Description (*)</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s8 translateY">
                                    <input type="checkbox" class="filled-in" id="conditions" name="conditions"/>
                                    <label for="conditions">I accept conditions.</label>
                                    <a class="modal-trigger" href="#modal-conditions"><span>Read conditions</span></a>
                                </div>
                                <div class="col s4">
                                    <button class="btn waves-effect waves-light btn-large right" type="submit" name="submit" id="submit">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Modal Conditions -->
        <div id="modal-conditions" class="modal bottom-sheet">
            <div class="modal-content">
                <h4>Conditions</h4>
                <p>COSTS: Publish and edit a product cost 1€. If the user has not the money need it, the product will not be published or edited.</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>

    </div>
</section>



{$modules.footer}