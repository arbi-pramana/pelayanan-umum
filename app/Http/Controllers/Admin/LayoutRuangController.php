<?php

namespace App\Http\Controllers\Admin;

use App\Models\LayoutRuang;
use Illuminate\Http\Request;
use LaraSpells\FormModel\FormModel;
use App\Http\Controllers\Controller;

class LayoutRuangController extends Controller
{

    protected $layoutruang;

    /**
     * Constructor
     *
     * @param  App\Models\Ruang $ruang
     * @return void
     */
    public function __construct(LayoutRuang $layoutruang)
    {
        $this->layoutruang = $layoutruang;
    }

    /**
     * Display list ruang
     *
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function pageList(Request $request)
    {
        $limit = (int) $request->get('limit') ?: 10;
        $keyword = $request->get('keyword');

        $query = $this->layoutruang->query();

        if ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('id_ruang', 'like', "%{$keyword}%");
                $query->orWhere('nama_ruang', 'like', "%{$keyword}%");
            });
        }

        $data['title'] = 'List Layout Ruang';
        $data['pagination'] = $query->paginate($limit);

        return view('admin::layout-ruang.page-list', $data);
    }

    /**
     * Show detail ruang
     *
     * @param  Illuminate\Http\Request $request
     * @param  string $id
     * @return Illuminate\Http\Response
     */
    public function pageDetail(Request $request, $id)
    {
        $ruang = $this->findOrFail($id);

        $data['title'] = 'Detail Layout Ruang';
        $data['ruang'] = $ruang;

        return view('admin::layout-ruang.page-detail', $data);
    }

    /**
     * Display form create ruang
     *
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function formCreate(Request $request)
    {
        $data['title'] = 'Form Create Layout Ruang';
        $data['form'] = $this->form(new LayoutRuang)->withAction(route('admin::layout-ruang.post-create'));

        return view('admin::layout-ruang.form-create', $data);
    }

    /**
     * Insert new ruang
     *
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
        $this->form(new LayoutRuang)->submit($request);

        $message = 'Ruang has been created!';
        return redirect()->route('admin::layout-ruang.page-list')->with('info', $message);
    }

    /**
     * Display form edit ruang
     *
     * @param  Illuminate\Http\Request $request
     * @param  string $id
     * @return Illuminate\Http\Response
     */
    public function formEdit(Request $request, $id)
    {
        $layoutruang = $this->findOrFail($id);

        $data['title'] = 'Form Edit Ruang';
        $data['form'] = $this->form($layoutruang)->withAction(route('admin::layout-ruang.post-edit', [$id]));

        return view('admin::layout-ruang.form-edit', $data);
    }

    /**
     * Update specified ruang
     *
     * @param  Illuminate\Http\Request $request
     * @param  string $id
     * @return Illuminate\Http\Response
     */
    public function postEdit(Request $request, $id)
    {
        $layoutruang = $this->findOrFail($id);

        $this->form($layoutruang)->submit($request);

        $message = 'Ruang has been updated!';
        return redirect()->route('admin::layout-ruang.page-list')->with('info', $message);
    }

    /**
     * Delete specified ruang
     *
     * @param  Illuminate\Http\Request $request
     * @param  string $id
     * @return Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $layoutruang = $this->findOrFail($id);

        // Delete data
        $deleted = $layoutruang->delete();
        if (!$deleted) {
            $message = 'Something went wrong when delete Ruang';
            return back()->with('danger', $message);
        }

        $message = 'Ruang has been deleted!';
        return redirect()->route('admin::layout-ruang.page-list')->with('info', $message);
    }

    /**
     * Find ruang by 'id' or display 404 if not exists
     *
     * @return Illuminate\Http\Response
     */
    protected function findOrFail($id)
    {
        $layoutruang = $this->layoutruang->find($id);
        if (!$layoutruang) {
            return abort(404, 'Ruang not found');
        }

        return $layoutruang;
    }

    /**
     * Setup FormModel
     *
     * @param  App\Models\Ruang $ruang
     * @return LaraSpells\FormModel\FormModel
     */
    protected function form(LayoutRuang $layoutruang)
    {
        return FormModel::make($layoutruang, [
            'nama_layout_ruang' => [
                'input' => "text",
                'label' => "Nama Layout Ruang",
                'maxlength' => "255",
                'rules' => [
                    "required",
                    "max:255"
                ]
            ],
            'foto' => [
                'input' => "file",
                'label' => "Foto Layout Ruangan",
                'delete_old_file' => true,
                'upload_disk' => "uploads",
                'upload_path' => "layoutruangan\/foto_layout-ruang",
                'rules' => [
                    "required",
                    "max:10000"
                ]
            ]
        ])->withViewData([
            // phpcs:ignore
            'before_button_save' => '<a class="btn btn-default" href="'.route('admin::ruang.page-list').'"><i class="fa fa-chevron-left"></i> Cancel</a>&nbsp;',
        ]);
    }
}
