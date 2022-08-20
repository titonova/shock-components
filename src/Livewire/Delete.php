<?php

namespace Titonova\ShockComponents\Livewire;

use Str;
use WireUi\Traits\Actions;
use Illuminate\Database\Eloquent\Model;
use Titonova\XLivewire\Components\XLivewireBaseComponent;


class Delete extends  XLivewireBaseComponent
{

    use Actions;

    /**
     * The model to delete.
     *
     * @var Model
     */
    public  Model $obj;


    /**
     * Whether the current user is allowed to delete the current object model.
     *
     * It should usually be a dynamic statement returning a boolean value (rather than simply true or false)
     *
     * For example, you can use the following code to check if the current user is the owner of the model:
     * before they are allowed  to delete the model:
     *
     * <... :allow="$obj->user_id == auth()->user()->id" ...>
     *
     * @var boolean
     */
    public bool $allow;

    /**
     * Whether the component should be visible on the page
     *
     * Unless the property is explicitedly set in the tag,
     * By default, the value is true if the model $obj is not null and the user is allowed to delete the model.
     *
     * @var boolean
     */
    public $show;

    /**
     * The JS object containing options for the confirm dialog.
     *
     * Omit or leave null to use the default options.
     * https://livewire-wireui.com/docs/dialogs
     *
     * @var string|null
     */
    public $confirm =
            "{
                title,
                icon: 'warning',
                method: 'delete'
            }";

    /**
     * The "name" of the model that would be in success, confirmation and error messages.
     *
     * By default, the value is the model's class name.
     * @var string
     */
    public string $modelName;

    /**
     * Confirmation Message when the  model is about to be deleted
     *
     * @var string
     */
    public string $confirmDelMsg;

    /**
     * Success Message when the  model is succesfully deleted
     *
     * @var string
     */
    public string $successMsg;

    /**
     * Error Message when the  model is not deleted
     *
     * @var string
     */
    public string $errorMsg;

    /**
     * Error Message when the the user tries to delete a model that they aren't allowed to.
     * Usually though, the component won't be visible at all if the options are set properly.
     * @var string
     */
    public string $notPermittedMsg;

    /**
     * The name of the event that would be emitted when the model is deleted.
     *
     * @var string
     */
    public string $postDeletedEventName = "{modelName}-deleted";

    public function mount()
    {
        $this->refreshData();
    }
    public function refreshData()
    {
        $this->setProps();


        if(!is_null($this->obj)){

            $this->modelName   ??= Str::headline(Str::of($this->obj::class)->basename());
            $this->successMsg ??=  "$this->modelName deleted successfully";
            $this->errorMsg  ??=  $this->errorMsg ?? "$this->modelName could not be deleted";
            $this->notPermittedMsg ??=  $this->notPermittedMsg ?? "You are not allowed to delete this ". Str::lower($this->modelName);
            $this->confirmDelMsg ??= " Are you sure you want to delete this ". Str::lower($this->modelName);
        }
        else{
            trigger_error("The model to delete is null", E_USER_WARNING);
        }
        $this->show  ??= ($this->allow ?? $this->obj);

        if(is_null($this->allow)){
            trigger_error('Property $allow cannot be left null');
        }
    }
    public function delete()
    {

        $this->refreshData();
        if ($this->allow) {
            if($this->obj->delete()){
                $this->notification()->success($this->successMsg);
            }
            else{
                $this->notification()->error($this->errorMsg);
            }
        }

        else{
             $this->notification()->error($this->notPermittedMsg);
        }

        $this->emitUp(Str::lower(str_replace('{modelName}', $this->modelName, $this->postDeletedEventName)));


    }

    public function render()
    {
        return view('shock-components::livewire.delete');
    }
}

