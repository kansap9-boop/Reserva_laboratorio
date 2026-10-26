**58 Material Design**

*Tinta y papel digital — El sistema operativo de la web*

| Familia | Estilos de Interfaz Específicos |
| :---- | :---- |
| **Índice** | 05 / 09 |
| **Filosofía** | Las interfaces están compuestas de "hojas de papel" digital, un material que tiene superficie sólida, genera sombra en un entorno 3D, y reacciona a los toques con "tinta" mágica. Se basa en una jerarquía tipográfica inquebrantable. |
| **Referentes** | El ecosistema de aplicaciones de Google, framework MUI (Material-UI), Vuetify, Android OS UI. |
| **Emoción** | Previsibilidad, orden corporativo universal, eficiencia lógica. |
| **Sectores** | Aplicaciones empresariales, paneles de administración masivos, software Android nativo, web-apps corporativas. |

## **1\. Filosofía de Material Design**

Introducido por Google en 2014, Material Design fue un intento de estandarizar la usabilidad global. Cada píxel debe obedecer leyes físicas: el papel puede deslizarse, superponerse y elevarse, pero nunca atravesarse a sí mismo (como si fueran objetos físicos en una caja poco profunda).

## **2\. Paleta de Color**

Colores inspirados en el diseño arquitectónico moderno y señalética de carreteras.

| Categoría | Características | Uso típico |
| :---- | :---- | :---- |
| **Color Primario (y variantes)** | Colores muy definidos de la escala Material (Ej. Blue 500, Purple 700). | Barras de aplicaciones (App Bars), botones primarios, estados activos. |
| **Acento (Secondary)** | Un color de alto contraste con el primario (ej. Teal, Pink, Amber). | Floating Action Buttons (FAB), toggles, barras de progreso. |
| **Background / Surface** | Blanco absoluto (\#FFFFFF) o gris extremadamente claro. | El "papel" de las tarjetas (cards) y modales. |

## **3\. Tipografía**

* **Fuentes recomendadas:** *Roboto* (la fuente oficial), o su reemplazo corporativo moderno *Google Sans*.  
* **Tratamiento:** Rigidez modular. Existe una escala estricta (Headline 1 a 6, Subtitle 1-2, Body 1-2, Button, Caption, Overline). Los botones utilizan siempre texto en MAYÚSCULAS con tracking (espaciado entre letras) positivo. Los textos de cuerpo se sitúan mayormente en gris de opacidad 87% para alta prioridad o 60% para baja prioridad (nunca negro puro).

## **4\. Formas y Elementos Visuales**

* **Elevación (Elevation):** El concepto clave. Es un sistema z-index enlazado a sobras específicas (dp o *density-independent pixels*). Una tarjeta está a elevación 2dp (sombra muy corta y definida), mientras que un FAB o Modal flotan a 8dp o 24dp (sombras expansivas y difusas).  
* **Botón de Acción Flotante (FAB):** Un círculo perfecto, generalmente en la esquina inferior derecha, que representa la acción primaria de toda la pantalla (ej. "Escribir nuevo correo").  
* **Bordes Subordinados:** Los contenedores suelen tener esquinas sutilmente redondeadas (estándar histórico de 4px, versiones recientes permiten más redondeo).

## **5\. Animaciones**

Material Design posee una guía de animación (*choreography*) exhaustiva.

* **Ripple Effect (Ondas de Tinta):** Al tocar o hacer clic en una superficie, un círculo de color translúcido (tinta) se expande desde el punto exacto de contacto hasta cubrir el elemento.  
* **Transformación de Material:** Si haces clic en una tarjeta para abrirla, la tarjeta no desaparece: crece, cambia de proporción asimétricamente y se convierte en la pantalla entera, mientras su sombra se intensifica al "acercarse" al usuario.  
* **Easing Material:** Las animaciones usan la curva estandarizada cubic-bezier(0.4, 0.0, 0.2, 1). Un inicio rápido seguido de una desaceleración muy suave.

## **6\. Variables CSS Conceptuales**

* **Sistema de Elevación:** Un diccionario de variables \--md-elevation-1 hasta \--md-elevation-24 que contiene configuraciones precisas de dos sombras por nivel (sombra de luz ambiente y sombra de luz direccional clave).  
* **Paleta de Tonos:** Variables que almacenan las gradaciones del 50 al 900 de cada tono base, permitiendo consistencia a lo largo del framework.  
* **Easing Curve:** Estandarización de \--md-transition: 250ms cubic-bezier(0.4, 0.0, 0.2, 1).

## **7\. Anti-patrones**

* **NUNCA** usar sombras de colores. Las sombras en Material Design siempre representan un bloqueo de luz fotorealista (grises o negras).  
* **NUNCA** superponer dos superficies a la misma elevación espacial. Cada capa requiere su propia altitud en el eje Z de sombras.  
* **NUNCA** usar múltiples Floating Action Buttons de igual tamaño y color en la misma pantalla; confunde cuál es la acción prioritaria de la vista.

---