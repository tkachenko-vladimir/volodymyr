module.exports = {
    'env': {
        'browser': true,
        'es6': true,
        'node': true
    },
    'extends': [
        'plugin:vue/essential',
        // 'eslint:recommended',
        '@vue/prettier'
    ],
    'globals': {
        'Atomics': 'readonly',
        'SharedArrayBuffer': 'readonly'
    },
    'parserOptions': {
        'ecmaVersion': 2018,
        'sourceType': 'module',
        'parser': 'babel-eslint'
    },
    'plugins': [
        'vue'
    ],
    'rules': {
        'vue/valid-v-on': [
          'error', {
            'modifiers': ['focus', 'blur']
          }
        ],
        'indent': [
            'error',
            2
        ],
        'linebreak-style': [
            'error',
            'unix'
        ],
        'semi': [
            'error',
            'never'
        ],
        'arrow-parens': [
            'error',
            'as-needed'
        ],
        'no-console': process.env.NODE_ENV === 'production' ? 'off' : 'off',
        'no-debugger': process.env.NODE_ENV === 'production' ? 'off' : 'off'
    }
}
