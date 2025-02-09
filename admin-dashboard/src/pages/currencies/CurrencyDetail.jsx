import { useEffect } from "react";
import { useParams, NavLink, useNavigate } from "react-router";
import { useForm, Controller } from "react-hook-form";
import { useCurrency } from "../../contexts/CurrencyContext";
import { useExchangerate } from "../../contexts/ExchangerateContext";
import { fetchPostForm } from "../../services/fetchPost";
import { CardAction, CardFooter, PrimaryButton } from "../../components/ui";
import {ImageField, inputTextStyle} from "../../components/forms";
import {ModalDelete} from "../../components/ModalDelete";
import { fetchPost } from "../../services/fetchPost";
import { ComeBackLink } from "../../components/ComeBackLink";
import {displayResponseMessages} from "../../lib/utils";

export  function CurrencyDetail() {
  let { id } = useParams();
  const navigate = useNavigate();
  const {getCurrency, removeCurrency, updateCurrency} = useCurrency();
  const {refetchExchangerates} =  useExchangerate()
  const currency = getCurrency(id)
  const endpoint = "currencies/" + id;
  
  const { register, handleSubmit, setValue, setError, control, formState: { errors, isSubmitting } } = useForm();
  
  const onSubmit = async (data) => {
    const newData = {...data, "_method":"PUT"}
    const formData = new FormData();
    Object.entries(newData).forEach(([key, value]) => formData.append(key, value));
    const response = await fetchPostForm(endpoint, formData);

    displayResponseMessages(response, data, setError);

    if (!response.errors) {
      navigate("../");
      updateCurrency(id, response.data)
    }

  }

  const deleteCurrency = async () => {
      const response = await fetchPost(endpoint, null, "DELETE");
      displayResponseMessages(response, {}, setError);
      
      if (!response.errors) {
        removeCurrency(id);
        refetchExchangerates();
        navigate("../");
      }
    }

  // update fields when data is loaded  
  useEffect(() => {
    if (currency) {
      setValue( "name", currency.name); 
      setValue( "symbol", currency.symbol);
    }
  }, [currency]);


  return (
    <section>
      <ComeBackLink />

      <p>
        <NavLink to="../">Volver</NavLink>
      </p>
      <h1 className="text-3xl font-medium">Editando Moneda {currency?.name}</h1>

      <form className="max-w-sm" onSubmit={handleSubmit(onSubmit)} >
      <CardAction extraClass="gap-4">
        <div>
          <label htmlFor="name" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de la Moneda</label>
          {errors.name && <p className="text-red-800 font-medium">{errors.name.message}</p>}
          <input 
          placeholder="Real" 
          className={inputTextStyle}
          {...register("name", 
          {
            required: {value: "Proporciona un nombre"},
            maxLength: {value:50, message: "el nombre debe tener maximo 50 letras"},
            minLength: {value:3, message: "el nombre debe tener minimo 3 letras"},
          }
          )}
          />
        </div>

        <div>
          <label htmlFor="symbol" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Simbolo</label>
          {errors.symbol && <p className="text-red-800 font-medium">{errors.symbol.message}</p>}
          <input 
          placeholder="R$" 
          className={inputTextStyle}
          {...register("symbol", 
            {
              required: "Proporciona un simbolo",
              maxLength: {value:5, message: "el simbolo debe tener maximo 8 letras"},
            }
          )}
          />
        </div>

     
        {/* https://claritydev.net/blog/react-hook-form-multipart-form-data-file-uploads */}
        {/* https://react-hook-form.com/docs/usecontroller/controller */}

          <Controller
            control={control}
            name={"image"}
            // rules={{ required: "Recipe picture is required" }}
            render={({ field: { value, onChange, ...field } }) => { // this line makes the magic
              return (
                <ImageField
                  {...field}
                  value={value?.fileName}
                  initialImage={currency?.image} 
                  onChange={(event) => {
                    onChange(event.target.files[0]);
                  }
                }
                />
              );
            }}
          />

        <CardFooter extraClass="justify-end">
          <PrimaryButton
            isDisabled={isSubmitting}
          
          >Guardar Cambios</PrimaryButton>
        </CardFooter>
      </CardAction>  
      </form>

      <div className="mt-12 w-full max-w-4xl flex flex-col sm:flex-row gap-4 justify-between items-center">
        <div className="w-full max-w-lg">
          <p className="text-lg mb-2">Eliminar Moneda</p>
          <p>Al eliminar esta moneda también se eliminará cualquier <b>Tipo de Cambio</b> en el que estés usando esta moneda</p>
        </div>

        <ModalDelete 
            isDisabled={isSubmitting}

        deleteButtonText="Eliminar Moneda"
        deleteCallback={deleteCurrency}>
          <h3 className="mb-2 text-lg text-gray-500 dark:text-gray-400">Estás seguro de que quieres eliminar esta Moneda?</h3>
          <p className="mb-5 text-left  text-sm px-2">Recuerda que al eliminar esta moneda tambien se eliminarán todos los <b>Tipos de Cambio</b> en la que esta aparezca.</p>
        </ModalDelete>
      </div>

    </section>
  )
}
