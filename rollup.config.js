import commonjs from 'rollup-plugin-commonjs';
import copy from 'rollup-plugin-cpy';
import postcss from 'rollup-plugin-postcss';
import resolve from 'rollup-plugin-node-resolve';
import { terser } from "rollup-plugin-terser";

const { env } = process;
const isProduction = env.NODE_ENV === 'production';

const CONFIG = {
  plugins: [
    copy({
      files: [
        './static/fonts/**/*'
      ],
      dest: './dist/',
      options: {
        verbose: true
      }
    }),

    postcss({
      extract: true,
      minimize: isProduction,
      plugins: []
    }),

    resolve(),
    commonjs()
  ],

  input: './static/index.js',

  output: {
    file: './dist/index.js',
    format: 'iife',
    sourcemap: isProduction ? false : 'inline'
  }
};

if (isProduction) {
  CONFIG.plugins.push(terser());
}

export default CONFIG;
