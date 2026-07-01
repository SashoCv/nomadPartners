<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FaqController extends Controller
{
    public function index()
    {
        try {
            $language_id = Auth::user()->language_id;
            $faqs = Faq::where('language_id', $language_id)
                ->orderBy('order', 'asc')
                ->get();

            return view('Faqs.index', compact('faqs'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function getFaqsApi(Request $request)
    {
        try {
            $language = $request->language;
            $language_id = Language::where('name', $language)->first()->id;

            $faqs = Faq::where('language_id', $language_id)
                ->orderBy('order', 'asc')
                ->get();

            if ($faqs->isEmpty()) {
                $faqs = Faq::where('language_id', 1)
                    ->orderBy('order', 'asc')
                    ->get();
            }

            return response()->json(['faqs' => $faqs]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());

            return response()->json(['error' => 'Error fetching faqs']);
        }
    }

    public function store(Request $request)
    {
        try {
            $language_id = Auth::user()->language_id;

            $faq = new Faq();
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->language_id = $language_id;

            if (! $request->order) {
                $lastFaq = Faq::where('language_id', $language_id)
                    ->orderBy('order', 'desc')
                    ->first();
                $faq->order = $lastFaq ? $lastFaq->order + 1 : 1;
            } else {
                $faq->order = $request->order;
            }

            $faq->save();

            return redirect()->route('admin.faqsView');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $faq = Faq::findOrFail($id);
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->order = $request->order;

            $faq->save();

            return redirect()->route('admin.faqsView');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        try {
            $faq = Faq::findOrFail($id);
            $faq->delete();

            return redirect()->route('admin.faqsView');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
