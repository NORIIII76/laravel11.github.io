<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Product; 

use App\Models\PurchaseHistory;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\Request;

//import Http Request
use Illuminate\Http\RedirectResponse;

//import Facades Storage
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
{
    // Fetch all products
    $products = Product::latest()->paginate(3);

    // Fetch all purchase histories with their related products
    $purchaseHistories = PurchaseHistory::with('product')->get();
    
    // Render the view and pass both sets of data
    return view('products.index', compact('products', 'purchaseHistories'));

}


    public function shoping() {
        $products = Product::all(); // Mengambil semua produk dari database
        return view('shoping', compact('products'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        //create product
        Product::create([
            'image'         => $image->hashName(),
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock
        ]);

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show($id)
{
    $product = Product::findOrFail($id);
    return view('products.show', compact('product'));
}

    
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //render view with product
        return view('products.edit', compact('product'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'image'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        //get product by ID
        $product = Product::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());

            //delete old image
            Storage::delete('public/products/'.$product->image);

            //update product with new image
            $product->update([
                'image'         => $image->hashName(),
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);

        } else {

            //update product without image
            $product->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);
        }

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //delete image
        Storage::delete('public/products/'. $product->image);

        //delete product
        $product->delete();

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function buy(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Validasi jumlah pembelian
    $request->validate([
        'quantity' => 'required|integer|min:1|max:' . $product->stock,
    ]);

    $quantity = $request->input('quantity');
    $totalPrice = $quantity * $product->price;

    // Tambahkan ke history pembelian
    PurchaseHistory::create([
        'product_id' => $product->id,
        'quantity' => $quantity,
        'total_price' => $totalPrice,
        'status' => 'in_process', // Set status awal sebagai "Dalam Proses"
    ]);

    // Kurangi stok
    $product->stock -= $quantity;
    $product->save();

    return redirect()->back()->with('success', 
    'Pembelian berhasil!<br>Total Harga: Rp ' . number_format($totalPrice, 2, ',', '.') . '<br>Stok Tersisa: ' . $product->stock);
}


public function adminlogin()
    {
        // Your admin login logic here
        return view('adminlogin'); // Assuming you have a 'loginadmin.blade.php' file
    }


public function purchaseHistory()
    {
        $purchaseHistories = PurchaseHistory::with('product')->get();
        return view('products_history', ['purchaseHistories' => $purchaseHistories]);
    }


    public function updateStatus(Request $request, $id)
    {
        // Validasi input status
        $validated = $request->validate([
            'status' => 'required|in:in process,success,failed',
        ]);
    
        // Ambil data history pembelian berdasarkan ID
        $history = PurchaseHistory::find($id);
    
        // Perbarui status pengiriman
        if ($history) {
            $history->status = $validated['status'];
            $history->save();
            return redirect()->back()->with('success', 'Status updated successfully!');
        }
    
        return redirect()->back()->with('error', 'History pembelian tidak ditemukan.');

    }
    


}


