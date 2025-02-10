import { NavLink, useNavigate } from "react-router";
import { useForm, Controller } from "react-hook-form";
import { useCurrency } from "../../contexts/CurrencyContext";
import { CardAction, CardFooter, PrimaryButton } from "../../components/ui";
import {ImageField, inputTextStyle} from "../../components/forms";
import { fetchPostForm } from "../../services/fetchPost";
import { ComeBackLink } from "../../components/ComeBackLink";
import {toast} from "react-toastify";
import {displayResponseMessages} from "../../lib/utils";

export function CurrencyCreate() {
  const endpoint = "currencies";
  const navigate = useNavigate();
  const {addCurrency} = useCurrency()
  const { register, handleSubmit, setValue, setError, control, formState: { errors, isSubmitting } } = useForm();

  
  const onSubmit = async (data) => {
    const formData = new FormData();
    Object.entries(data).forEach(([key, value]) => formData.append(key, value));
    const response = await fetchPostForm(endpoint, formData);
    
    displayResponseMessages(response, data, setError)

    if (!response.errors) {
      addCurrency(response.data)
      navigate("../");
    }
  }


  return (
    <section>
      <ComeBackLink />

      <h1 className="mb-10 text-3xl font-medium">Registrar Moneda</h1>

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
              maxLength: {value:5, message: "el simbolo debe tener maximo 5 letras"},

            }
          )}
          />
        </div>

     
        {/* https://claritydev.net/blog/react-hook-form-multipart-form-data-file-uploads */}
        {/* https://react-hook-form.com/docs/usecontroller/controller */}
          
        {errors.image && <p className="text-red-800 font-medium">{errors.image.message}</p>}
          <Controller
            control={control}
            name={"image"}
            // rules={{ required: "Recipe picture is required" }}
            render={({ field: { value, onChange, ...field } }) => { // this line makes the magic
              return (
                <ImageField
                  {...field}
                  value={value?.fileName}
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

    </section>
  )
}
