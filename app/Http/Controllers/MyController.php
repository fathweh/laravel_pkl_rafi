<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    private $arr = [
            ['id' => 1, 'nama' => 'faza', 'kelas' => 'xii rpl 1'],
            ['id' => 2, 'nama' => 'ubed', 'kelas' => 'xii rpl 2'],
            ['id' => 3, 'nama' => 'cemen', 'kelas' => 'xii rpl 3'],
        ];

    public function index()
    {
        $siswa = session('siswa_data',$this->arr);
        return view('siswa', ['siswa'=>  $this->arr]);
    }

    public function show($id){
        $siswa = session('siswa_data',$this->arr);
        $siswa = collect($this->arr)->firstWhere('id', $id);

        if (! $siswa) {
            abort(404);
        }
        return view('show_siswa', ['siswa' => $siswa]);
    }

    public function create(){
        return view('create_siswa');
    }

    public function store()
    {
        $siswa = session('siswa_data',$this->arr);
        $newId = collect($siswa)->max('id') + 1;
        $siswa[] = [
            'id' => $newId,
            'kelas' => $request->kelas,
            'nama' => $request->nama,
        ];

        session(['siswa_data' => $siswa]);

        return redirect('/siswa');
    }

    public function edit($id){
        $siswa = session('siswa_data',$this->arr);
        $siswa = collect($this->arr)->firstWhere('id', $id);

        if (! $siswa) {
            abort(404);
        }
        return view('edit_siswa', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $data = session('siswa_data',$this->arr);

        $siswaId = collect($data)->search(fn($item) => $item['id'] == $id);
    

        $data[$siswaId]['nama'] = $request->nama;
         $data[$siswaId]['kelas'] = $request->kelas;

         session(['siswa_data' => $data]);
         return redirect('siswa');
    }

    public function destroy($id)
    {
        $siswa = session ('siswa_data', $this->arr);
        $index = array_search($id,array_column($siswa, 'id'));

        array_splice($siswa, $index, 1);

        session(['siswa_data' => $siswa]);

        return redirect('siswa');
    }
}

