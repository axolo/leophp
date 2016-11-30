//自身文件：
console.log('自身内容')

//传统JS：
require('./hello')

//模块化：module.exports
require('./callback')('自行编写的module.exports模块', function(req){ console.log(req) })

//第三方模块：位于node_modules/jquery
var $ = require('jquery')
console.log('从第三方库node_modules引入jQuery，以下为jQuery输出')
console.log($(document).attr('title'))
var color = ['red', 'green', 'blue']
$.each(color, function(index){
  console.log(color[index])
})
