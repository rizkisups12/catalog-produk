<div class="modal fade" id="modal-scan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Scan Barcode</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div id="interactive" class="viewport"></div>
                    </div>
                    
                    {{-- <div class="col-md-12 animated zoomIn" id="open-camera" style="display: none;">
                        <div class="row">
                            <center>
                                <div id="loadingMessage">
                                    🎥 Tidak dapat mengakses video stream (pastikan url yang diakses localhost atau memiliki sertifikat <strong>HTTPS</strong>)
                                </div>
                                <canvas id="canvas" hidden></canvas>
                                <div class="scanner-laser laser-leftTop" style="opacity: 1;"></div>
                                <div class="scanner-laser laser-leftBottom" style="opacity: 1;"></div>
                                <div class="scanner-laser laser-rightTop" style="opacity: 1;"></div>
                                <div class="scanner-laser laser-rightBottom" style="opacity: 1;"></div>
                                <div id="output" hidden>
                                    <div id="outputMessage">Scan QR Code</div>
                                </div>
                            </center>
                        </div>
                    </div> --}}
                    
                    {{-- untuk ganti kamera laptop ke hp --}}
                    <div class="col-md-12">
                        <div class="controls">
                            {{-- <button class="stop">Stop</button> --}}
                            <fieldset class="reader-config-group">
                                {{-- <label style="display: none">
                                    <span>Torch</span>
                                    <input type="checkbox" name="settings_torch" />
                                </label> --}}
                                {{-- <label>
                                    <span>Barcode-Type</span>
                                    <select name="decoder_readers">
                                        <option value="code_128" >Code 128</option>
                                        <option value="code_39">Code 39</option>
                                        <option value="code_39_vin">Code 39 VIN</option>
                                        <option selected="selected" value="ean">EAN</option>
                                        <option value="ean_extended">EAN-extended</option>
                                        <option value="ean_8">EAN-8</option>
                                        <option value="upc">UPC</option>
                                        <option value="upc_e">UPC-E</option>
                                        <option value="codabar">Codabar</option>
                                        <option value="i2of5">Interleaved 2 of 5</option>
                                        <option value="2of5">Standard 2 of 5</option>
                                        <option value="code_93">Code 93</option>
                                    </select>
                                </label>
                                <label>
                                    <span>Resolution (width)</span>
                                    <select name="input-stream_constraints">
                                        <option value="320x240">320px</option>
                                        <option selected="selected" value="640x480">640px</option>
                                        <option value="800x600">800px</option>
                                        <option value="1280x720">1280px</option>
                                        <option value="1600x960">1600px</option>
                                        <option value="1920x1080">1920px</option>
                                    </select>
                                </label>
                                <label>
                                    <span>Patch-Size</span>
                                    <select name="locator_patch-size">
                                        <option value="x-small">x-small</option>
                                        <option value="small">small</option>
                                        <option selected="selected" value="medium">medium</option>
                                        <option value="large">large</option>
                                        <option value="x-large">x-large</option>
                                    </select>
                                </label>
                                <label>
                                    <span>Half-Sample</span>
                                    <input type="checkbox" checked="checked" name="locator_half-sample" />
                                </label>
                                <label>
                                    <span>Workers</span>
                                    <select name="numOfWorkers">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option selected="selected" value="4">4</option>
                                        <option value="8">8</option>
                                    </select>
                                </label> --}}
                                <label style="display:none;">
                                    <span>Camera</span>
                                    <select name="input-stream_constraints" id="deviceSelection">
                                    </select>
                                </label>
                                {{-- <label style="display: none">
                                    <span>Zoom</span>
                                    <select name="settings_zoom"></select>
                                </label> --}}
                                
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>