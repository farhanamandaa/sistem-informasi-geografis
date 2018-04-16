<div class="col-md-2">
	<div class="sidebar">
		<div class="row justify-content-center">
			<form action="{{ url()->current() }}" method="GET">
				<div class="form-group" id="label">
                    <label for="title">Kategori : </label>
                    @foreach ($showCategory as $category)
                     	 
					<div class="form-group">
						<input class="form-check-input" type="checkbox" value="{{ $category->id }}" name="categories[]" >
						<label class="form-check-label" for="defaultCheck1">
							{{ $category->name }}
						</label>
					</div>

                     @endforeach
					
					<div class="form-group">
						<button class="btn btn-primary" type="submit" id="submit">Cari</button>
					</div>

					<div class="form-group">
						<label for="title"> Lokasi Anda :</label>
					</div>

					<div class="form-group">
						<button class="btn btn-primary" type="button" id="getlocation">Get Location</button>
					</div>
                </div>
			</form>
		</div>
	</div>
</div>

<script>




</script>