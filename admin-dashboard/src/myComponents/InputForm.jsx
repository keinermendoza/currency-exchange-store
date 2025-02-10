import { inputTextStyle } from "./inputStyles";
export function Input({register, name, label, errors, placeholder="", ...rest}) {
    return (
  
    <div>
    <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white" htmlFor={name}>{label}</label>
    {errors[name] && <p className="text-red-800 font-medium">{errors[name].message}</p>}
    <input 
    id={name}
    placeholder={placeholder} 
    className={inputTextStyle}
    {...register(name, {...rest})}  
    />
  </div>
    )
  
  }
  
  export function Textarea({register, name, label, errors, placeholder="", rows="3", ...rest}) {
    return (
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white" htmlFor={name}>{label}</label>
        {errors[name] && <p className="text-red-800 font-medium">{errors[name].message}</p>}
        <textarea 
          cols="30" 
          rows={rows}
          id={name}
          placeholder={placeholder} 
          className={inputTextStyle}
          {...register(name, {...rest})}  
          ></textarea>
      </div>
    )
  
  }
  

export function Radio({ label, labelClassName = "", value, register, name, ...rest }) {
    const sufix = Math.random();
    const randomId = name + sufix; 
    return (
      <div className="flex items-center" >
        <input
        value={value}
  
        className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
        id={randomId} 
        type="radio" 
        {...register(name)} 
        {...rest}  />
        <label
        className="ms-4 text-sm font-medium text-gray-900 dark:text-gray-300" 
        htmlFor={randomId} >{label}</label>
      </div>
    );
  }
  
  
  
  