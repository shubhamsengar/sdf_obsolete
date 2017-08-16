<div class='container' ng-controller='c_kurti_comm_form'>
    <form>
        <div class='row'>
             <!-- name, article_sub_type, style_name, material, product_desc, features, occasion_type, sleeve_type, pattern, condition -->

            <div class="form-group col-xs-4">
                <label for="name">Name:</label>
                <textarea type="text" class="form-control" ng-model="name" rows="5" id="name" required></textarea>
            </div>
            <div class="form-group col-xs-2">
                <label for="art_sub_type">Article Sub Type:</label>
                <input type="text" class="form-control" ng-model='article_sub_type' id="art_sub_type" required>
            </div>

            <div class="form-group col-xs-2">
                <label for="style_name">Style Name:</label>
                <input type="text" class="form-control" ng-model='style_name' id="style_name" required>
            </div>
            <div class="form-group col-xs-2">
                <label for="material">Material:</label>
                <input type="text" class="form-control" ng-model='material' id="material" required>
            </div>
            <div class="form-group col-xs-2">
                <label for="occ_type">Occasion Type:</label>
                <input type="text" class="form-control" ng-model="occasion_type" id="occ_type" required>
            </div>
        </div>
        <div class='row'>
            <div class="form-group col-xs-4">
                <label for="prod_desc">Product Description:</label>
                <textarea type="text" class="form-control" ng-model='product_desc' rows="5" id="prod_desc" required></textarea>
            </div>
            <div class="form-group col-xs-2">
                <label for="sleeve_type">Sleeve Type:</label>
                <input type="text" class="form-control" ng-model='sleeve_type' id="sleeve_type" required>
            </div>
            <div class="form-group col-xs-2">
                <label for="pattern">Pattern:</label>
                <input type="text" class="form-control" ng-model='pattern' id="pattern" required>
            </div>
            <div class="form-group col-xs-2">
                <label for="condition">Condition:</label>
                <input type="text" class="form-control"  id="condition" readonly>
            </div>
            <div class="form-group col-xs-2">
                <label for="features">Features:</label>
                <input type="text" class="form-control"  id="features" readonly>
            </div>

        </div>

        <div class='row pull-right'>
            <button type="submit" ng-click='submit()' class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<!-- Container End -->